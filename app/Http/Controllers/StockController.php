<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Bg;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $bgs = Bg::where('is_jbu',false)
            ->where('is_power',false)
            ->with("supplier")
            ->get()
            ->sortBy("supplier.pps_code");

        return Inertia::render("Stock/Index", [
            "bgs" => $bgs,
            "month" => $request->month,
        ]);
    }

    public function store(Request $request)
    {
        $dt = new Carbon($request->month . "-01");
        $startOfMonth = $dt->startOfMonth()->toDateString();
        $endOfMonth = $dt->endOfMonth()->toDateString();
        $daysInMonth = CarbonPeriod::create($startOfMonth, $endOfMonth)->toArray();

        $request->validate([
            "bg_id" => ["integer", "exists:bgs,id", "required"],
            "segments" => ["array", "required"],
            "segments.*" => ["array", "required"],
            "segments.*.*" => ["integer", "required"],
        ]);

        // 日付でループしながら配列を作成
        foreach ($daysInMonth as $index => $day) {
            $insert['uuid'] = (string) str()->uuid();
            $insert['bg_id'] = $request->bg_id;
            $insert['date'] = $day->format('Y-m-d');
            $insert['user_id'] = Auth::id();

            $segments = $request->segments[$index];
            foreach ($segments as $segment => $value) {
                $insert['segment_' . $segment + 1] = $value;
            }
            $bulk[] = $insert;
        }

        // BGと日付が一致したら同じものとしてupdate
        Stock::upsert($bulk, ['bg_id', 'date']);

        return redirect()->route("stock.create");
    }

    public function show(Bg $bg, Request $request)
    {
        $dt = new Carbon();
        $startOfMonth = $dt->startOfMonth()->toDateString();
        $endOfMonth = $dt->endOfMonth()->toDateString();

        $stocks = Stock::where("bg_id", $bg->id)
            ->whereBetween("date", [$startOfMonth, $endOfMonth])
            ->orderBy("date", "asc")
            ->get();

        $bg = Bg::find($bg->id)->with('supplier')->first();

        return Inertia::render("Stock/Show", [
            "bg" => $bg,
            "stocks" => $stocks,
            "month" => $request->month,
        ]);
    }

    public function edit(Bg $bg, Stock $stock, Request $request)
    {

    }

    public function update(Request $request, Stock $stock)
    {
        //
    }

    public function destroy(Stock $stock)
    {
        //
    }
}
