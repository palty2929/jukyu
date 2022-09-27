<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::with("supplier")
            ->paginate(20);

        return Inertia::render("Master/Area/Index", [
            "areas" => $areas,
        ]);
    }

    public function create()
    {
        $suppliers = Supplier::select("id as value", "disp_name as label")
            ->get()
            ->toArray();

        return Inertia::render("Master/Area/Create", [
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
            "gen_upload_code" => ["string", "nullable"],
            "is_retail" => ["boolean"],
            "is_spot" => ["boolean"],
            "uuid" => ["uuid", "required"],
            "user_id" => ["integer", "exists:users,id", "required"],
        ]);

        Area::create($validate);

        return redirect()->route("area.index");
    }

    public function show(Area $area)
    {
        //
    }

    public function edit(Area $area)
    {
        $suppliers = Supplier::select("id as value", "disp_name as label")
            ->get()
            ->toArray();

        return Inertia::render("Master/Area/Edit", [
            "area" => $area,
            "suppliers" => $suppliers,
        ]);
    }

    public function update(Request $request, Area $area)
    {
        $validate = $request->validate([
            "start_on" => ["date", "required"],
            "end_on" => ["date", "after:start_on", "nullable"],
            "supplier_id" => ["integer", "exists:suppliers,id", "required"],
            "area_code" => ["integer", "between:1,10", "required"],
            "is_retail" => ["boolean"],
            "is_spot" => ["boolean"],
        ]);

        $area->fill($validate);
        $area->save();

        return redirect()->route("area.index");
    }

    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route("area.index");
    }
}
