<?php

namespace App\Http\Controllers;

use App\Models\Attedance;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\Clock\now;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $attedance = Attedance::where('user_id', Auth::id())->whereDate('date', now())->first();

        if (!$attedance) {
            return back()->with('errors', 'Anda harus melakukan check-in terlebih dahulu!');
        }

        Task::create([
            'attedance_id' => $attedance->id,
            'title' => $request->title
        ]);

        return back()->with('success', 'Task Ditambahkan');
    }

    public function update(Task $task)
    {
        if ($task->attedance->user_id !== Auth::id()) {
            abort(403, "Akses Ditolak! Kamu tidak bisa mengedit task milik orang lain");
        }
        // Tooggle status
        $task->update([
            'is_done' => !$task->is_done,
        ]);

        return back();
    }

    public function destroy(Task $task)
    {
        if ($task->attedance->user_id !== Auth::id()) {
            abort(403, "Akses Ditolak! Kamu tidak bisa menghapus task milik orang lain!");
        }

        $task->delete();

        return back()->with('success', 'Task berhasil dihapus!');
    }
}
