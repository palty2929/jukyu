<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::paginate(20);

        return Inertia::render('Position/Index', [
            'positions' => $positions,
        ]);
    }
}
