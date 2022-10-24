<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OperationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->account_date) {
            $account_date = $request->account_date;
        } else {
            $today = carbon::today();
            $account_date = $today->addDays(2)->toDateString();
        }
        
        $suppliers = new Supplier();
        $activeSuppliers = $suppliers->activeSuppliers($account_date);

        return Inertia::render('Operation', [
            'account_date' => $account_date,
            'suppliers' => $activeSuppliers,
        ]);
    }
}
