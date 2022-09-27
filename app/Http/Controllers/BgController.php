<?php

namespace App\Http\Controllers;

use App\Models\Bg;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class BgController extends Controller
{
    public function index()
    {
        $bgs = Bg::with("supplier")
        ->orderBy('created_at','desc')
        ->paginate(30);

        return Inertia::render("Master/Bg/Index", [
            "bgs" => $bgs,
        ]);
    }

    public function create()
    {
        $suppliers = Supplier::select("id as value", "disp_name as label")
            ->get()
            ->toArray();

        return Inertia::render("Master/Bg/Create", [
            "suppliers" => $suppliers,
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
            "area_code" => ["integer", "between:1,10", "required"],
            "bg_code" => ['regex:/^[LG][A-Z\d]{3}\d$/', "required"],
            "bg_name" => ["string", "max:25", "required"],
            "dummy_code" => ["regex:/[\w]+/", "max:25", "nullable"],
            "dummy_name" => ["string", "max:25", "nullable"],
            "is_jbu" => ["boolean"],
            "is_power" => ["boolean"],
            "is_sell" => ["boolean"],
            "uuid" => ["uuid", "required"],
            "user_id" => ["integer", "exists:users,id", "required"],
        ]);

        Bg::create($validate);

        return redirect()->route("bg.index");
    }

    public function show(Bg $bg)
    {
        //
    }

    public function edit(Bg $bg)
    {
        $suppliers = Supplier::select("id as value", "disp_name as label")
            ->get()
            ->toArray();

        return Inertia::render("Master/Bg/Edit", [
            "bg" => $bg,
            "suppliers" => $suppliers,
        ]);
    }

    public function update(Request $request, Bg $bg)
    {
        $validate = $request->validate([
            "start_on" => ["date", "required"],
            "end_on" => ["date", "after:start_on", "nullable"],
            "supplier_id" => ["integer", "exists:suppliers,id", "required"],
            "area_code" => ["integer", "between:1,10", "required"],
            "bg_code" => ['regex:/^[LG][A-Z\d]{3}\d$/', "required"],
            "bg_name" => ["string", "max:25", "required"],
            "dummy_code" => ["regex:/[\w]+/", "max:25", "nullable"],
            "dummy_name" => ["string", "max:25", "nullable"],
            "is_jbu" => ["boolean"],
            "is_power" => ["boolean"],
            "is_sell" => ["boolean"],
        ]);

        $bg->fill($validate);
        $bg->save();

        return redirect()->route("bg.index");
    }

    public function destroy(Bg $bg)
    {
        $bg->delete();
        return redirect()->route("bg.index");
    }
}
