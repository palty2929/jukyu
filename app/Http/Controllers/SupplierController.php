<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::withTrashed()
        ->orderBy('pps_code','asc')
        ->paginate(20);

        return Inertia::render("Master/Supplier/Index", [
            "suppliers" => $supplier,
        ]);
    }

    public function create()
    {
        return Inertia::render("Master/Supplier/Create");
    }

    public function store(Request $request)
    {
        $request->merge(["uuid" => (string) str()->uuid()]);
        $request->merge(["user_id" => Auth::id()]);

        $validate = $request->validate([
            "start_on" => ["date", "required"],
            "end_on" => ["date", "after:start_on", "nullable"],
            "pps_code" => ["required", "integer", "digits:4", Rule::unique('suppliers', 'pps_code')->whereNull('deleted_at')],
            "name" => ["max:30", "required"],
            "disp_name" => ["max:20", "required"],
            "uuid" => ["uuid", "required"],
            "user_id" => ["integer", "exists:users,id", "required"],
        ]);

        Supplier::create($validate);

        return redirect()->route("supplier.index");
    }

    public function show(Supplier $supplier)
    {
        //
    }

    public function edit(Supplier $supplier)
    {
        return Inertia::render("Master/Supplier/Edit", [
            "supplier" => $supplier,
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validate = $request->validate([
            "start_on" => ["date", "required"],
            "end_on" => ["date", "after:start_on", "nullable"],
            "pps_code" => ["integer", "digits:4", "required"],
            "name" => ["max:30", "required"],
            "disp_name" => ["max:20", "required"],
        ]);

        $supplier->fill($validate);
        $supplier->save();

        return redirect()->route("supplier.index");
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route("supplier.index");
    }
}
