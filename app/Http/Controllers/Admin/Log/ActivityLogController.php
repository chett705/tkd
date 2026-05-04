<?php

namespace App\Http\Controllers\Admin\Log;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    // public function index(Request $request)
    // {
    //     $logs = ActivityLog::with('user')
    //         ->when($request->filled('action'), fn($q) => $q->where('action', $request->action))
    //         ->when($request->filled('user_id'), fn($q) => $q->where('user_id', $request->user_id))
    //         ->latest('created_at')
    //         ->paginate(30);

    //     return view('backend.page.logs.index', compact('logs'));
    // }

    // public function show(string $id)
    // {
    //     $log = ActivityLog::with('user')->findOrFail($id);

    //     return view('backend.page.logs.show', compact('log'));
    // }

    public function destroy(string $id)
    {
        ActivityLog::findOrFail($id)->delete();

        return redirect()->route('admin.activity-logs.index')->with('success', 'Log deleted.');
    }

    public function clear()
    {
        ActivityLog::truncate();

        return redirect()->route('admin.activity-logs.index')->with('success', 'All logs cleared.');
    }
}
