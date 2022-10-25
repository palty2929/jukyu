<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Supplier;
use App\Http\Requests\AreaStoreRequest;
use App\Http\Requests\AreaUpdateRequest;
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

    public function store(AreaStoreRequest $request)
    {
        $validate = $request->validated();
        Area::create($validate);

        return redirect()->route("area.index");
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

    public function update(AreaUpdateRequest $request, Area $area)
    {
        $validate = $request->validated();

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
