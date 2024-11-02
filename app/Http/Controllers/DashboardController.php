<?php

namespace App\Http\Controllers;

use App\Models\Talk;
use App\Models\Conference;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(): View
    {
        // Fetch statistics
        $stats = $this->getStats();

        // Fetch recent talks
        $recentTalks = $this->getRecentTalks();

        // Fetch upcoming CFPs
        $upcomingCfps = $this->getUpcomingCfps();

        return view('dashboard', compact('stats', 'recentTalks', 'upcomingCfps'));
    }

    /**
     * Get dashboard statistics.
     */
    private function getStats(): array
    {
        $now = Carbon::now();

        return [
            'total_talks' => Talk::where('user_id', Auth::id())->count(),
            'upcoming_talks' => Talk::where('user_id', Auth::id())
                ->where('date', '>=', $now)
                ->count(),
            'open_cfps' => Conference::where('cfp_deadline', '>=', $now)
                ->count(),
        ];
    }

    /**
     * Get recent talks.
     */
    private function getRecentTalks()
    {
        return Talk::where('user_id', Auth::id())
            ->with('conference') // Assuming you have a conference relationship
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($talk) {
                return [
                    'id' => $talk->id,
                    'title' => $talk->title,
                    'duration' => $talk->duration . ' minutes',
                    'type' => $talk->type, // e.g., 'Workshop', 'Talk', etc.
                    'created_at_diff' => $talk->created_at->diffForHumans(),
                    'url' => route('talks.show', $talk),
                ];
            });
    }

    /**
     * Get upcoming CFP deadlines.
     */
    private function getUpcomingCfps()
    {
        $now = Carbon::now();

        return Conference::where('cfp_deadline', '>=', $now)
            ->orderBy('cfp_deadline')
            ->take(5)
            ->get()
            ->map(function ($conference) use ($now) {
                $deadline = Carbon::parse($conference->cfp_start_at);
                $daysLeft = $deadline->diffInDays($now, false); //

                return [
                    'id' => $conference->id,
                    'name' => $conference->title,
                    'deadline' => $deadline->format('M d, Y'),
                    'days_left' => $this->formatDaysLeft($daysLeft),
                    'url' => route('conferences.index', $conference),
                ];
            });
    }

    private function formatDaysLeft(int $days): string
    {
        if ($days < 0) {
            return 'Deadline passed';
        }

        if ($days === 0) {
            return 'Due today';
        }

        if ($days === 1) {
            return '1 day left';
        }

        return "$days days left";
    }
}
