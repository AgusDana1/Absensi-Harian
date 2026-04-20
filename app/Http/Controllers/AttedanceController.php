<?php

namespace App\Http\Controllers;

use App\Models\Attedance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use function Symfony\Component\Clock\now;

class AttedanceController extends Controller
{
    public function index()
    {
        $attedance = Attedance::with('tasks')
            ->where('user_id', Auth::id())
            ->whereDate('date', now())
            ->first();

        return Inertia::render('Dashboard', [
            'attedance' => $attedance
        ]);
    }

    public function checkIn(Request $request)
    {
        $request->validate([
            'plan' => 'required|string',
        ]);

        // Mencegah terjadinya double check in
        $existing = Attedance::where('user_id', Auth::id())->whereDate('date', now())->first();

        if ($existing) {
            return back()->with('error', 'Sudah check in hari ini!');
        }

        Attedance::create([
            'user_id' => Auth::id(),
            'date' => today()->toDateString(),
            'check_in' => now(),
            'plan' => $request->plan
        ]);

        return back()->with('success', 'Berhasil check-in');
    }

    public function checkOut(Request $request)
    {
        $request->validate([
            'result' => 'required|string',
        ]);

        $attedance = Attedance::where('user_id', Auth::id())->whereDate('date', now())->first();

        if (!$attedance) {
            return back()->with('errors', 'Belum check-In');
        }

        $attedance->update([
            'check_out' => now(),
            'result' => $request->result,
        ]);

        return back()->with('success', 'Berhasil Melakukan Check-Out');
    }
}
