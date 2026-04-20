<?php

namespace App\Http\Controllers;

use App\Models\Attedance;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $attedances = Attedance::with(['user', 'tasks'])->latest()->get();

        return Inertia::render('Admin/Dashboard', [
            'attedances' => $attedances
        ]);
    }
}
