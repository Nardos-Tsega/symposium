<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FavoritesController extends Controller
{
    public function index()
    {
        // Get the authenticated user's favorited conferences
        $conferences = Auth::user()->favoritedConferences->map(function($conference) {
            return [
                'id' => $conference->id,
                'title' => $conference->title,
                'category' => $conference->category,
                'date' => Carbon::parse($conference->start_at)->format('F j, Y'),
                'date_start' => Carbon::parse($conference->start_at)->format('Y-m-d'),
                'date_end' => Carbon::parse($conference->end_at)->format('Y-m-d'),
                'location' => $conference->location,
                'description' => $conference->description,
                'website' => $conference->url ?? 'Not Specified',
                'is_favorited' => true  // Since these are favorites, they're all favorited
            ];
        });

        return view('favorites.index', [
            'conferences' => $conferences,
        ]);
    }
}
