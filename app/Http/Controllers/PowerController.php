<?php

namespace App\Http\Controllers;

use App\Models\Power;
use App\Models\Supplier;
use App\Models\Bg;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PowerController extends Controller
{
    public function index()
    {
        $powers = Power::with("supplier")
        ->with('bg')
        ->paginate(20);

        return Inertia::render("Master/Power/Index", [
            "powers" => $powers,
        ]);
    }

    public function create(Request $request)
    {
        $suppliers = Supplier::select("id as value", "disp_name as label")
            ->get()
            ->toArray();

        $bgs = Bg::select("id as value", "bg_name as label")
            ->where("supplier_id", $request->supplier_id)
            ->where("is_power", true)
            ->get()
            ->toArray();

        return Inertia::render("Master/Power/Create", [
            "suppliers" => $suppliers,
            "bgs" => $bgs,
        ]);
    }

    public function store(Request $request)
    {
        $request->merge(["uuid" => (string) str()->uuid()]);
        $request->merge(["user_id" => Auth::id()]);

        $validate = $request->validate([
            "start_on" => ["date", "required"],
            "end_on" => ["date", "after:start_on", "nullable"],
            "supplier_id" => ["integer", "exists:suppliers,id", "required"],
            "bg_id" => ["integer", "exists:bgs,id", "required"],
            "type" => ["integer", "between:1,3", "required"],
            "power_code" => ["regex:/[\w]{5}/", "required"],
            "power_name" => ["string", "max:25", "required"],
            "contract_value" => ["integer", "required"],
            "identity_number" => ["string", "required"],
            "uuid" => ["uuid", "required"],
            "user_id" => ["integer", "exists:users,id", "required"],
        ]);

        Power::create($validate);

        return redirect()->route("power.index");
    }

    public function show(Power $power)
    {
        //
    }

    public function edit(Request $request, Power $power)
    {
        $suppliers = Supplier::select("id as value", "disp_name as label")
            ->get()
            ->toArray();

        // ページ読込時ではPPSが選ばれていないため、選択肢をselectedできないので代入しておく
        $supplier_id = $request->supplier_id ?? $power->supplier_id;
        $bgs = Bg::select("id as value", "bg_name as label")
            ->where("supplier_id", $supplier_id)
            ->where("is_power", true)
            ->get()
            ->toArray();

        return Inertia::render("Master/Power/Edit", [
            "power" => $power,
            "suppliers" => $suppliers,
            "bgs" => $bgs,
        ]);
    }

    public function update(Request $request, Power $power)
    {
        $validate = $request->validate([
            "start_on" => ["date", "required"],
            "end_on" => ["date", "after:start_on", "nullable"],
            "supplier_id" => ["integer", "exists:suppliers,id", "required"],
            "bg_id" => ["integer", "exists:bgs,id", "required"],
            "type" => ["integer", "between:1,3", "required"],
            "power_code" => ["regex:/[\w]{5}/", "required"],
            "power_name" => ["string", "max:25", "required"],
            "contract_value" => ["integer", "required"],
            "identity_number" => ["string", "required"],
        ]);

        $power->fill($validate);
        $power->save();

        return redirect()->route("power.index");
    }

    public function destroy(Power $power)
    {
        $power->delete();
        return redirect()->route("power.index");
    }
}
