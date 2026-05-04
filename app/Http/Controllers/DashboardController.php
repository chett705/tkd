<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cms\SectionItem;
use App\Models\Contact\ContactMessage;
use App\Models\Log\ActivityLog;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => SectionItem::where('section_key', 'project')->count(),
            'services' => SectionItem::where('section_key', 'services')->count(),
            'articles' => SectionItem::where('section_key', 'blog')->count(),
            'contacts' => ContactMessage::count(),
        ];

        // Content sections with real counts
        $sectionKeys = [
            'home'        => 'Home Page',
            'services'    => 'Services',
            'project'     => 'Projects Gallery',
            'blog'        => 'Blog Articles',
            'why_led_events' => 'Why LED Events',
            'how_we_work' => 'How We Work',
            'media'       => 'Media Gallery',
            'why_us'      => 'Why Us',
        ];

        $sectionCounts = SectionItem::selectRaw('section_key, count(*) as total, sum(is_active) as active_count')
            ->whereIn('section_key', array_keys($sectionKeys))
            ->groupBy('section_key')
            ->pluck('total', 'section_key');

        $sections = collect($sectionKeys)->map(function ($label, $key) use ($sectionCounts) {
            $count = $sectionCounts[$key] ?? 0;
            return [
                'name'   => $label,
                'items'  => $count,
                'status' => $count > 0 ? 'active' : 'empty',
            ];
        })->values();

        // Recent activity logs
        $activities = ActivityLog::with('user')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('backend.page.dashboard', compact('stats', 'sections', 'activities'));
    }
}
