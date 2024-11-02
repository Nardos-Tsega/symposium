<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $conferences = Conference::with('favoriteUsers')->get()->map(function($conference) {
            return [
                'id' => $conference->id,
                'title' => $conference->title,
                'category' => $conference->category,
                'date' => Carbon::parse($conference->start_at)->format('F j, Y'),
                'date_start' => $conference->start_at,
                'date_end' => $conference->end_at,
                'location' => $conference->location ,
                'description' => $conference->description,
                'website' => $conference->url ?? 'Not Specified',
                'is_favorited' => Auth::user()->favoritedConferences->contains($conference->id)
            ];
        });

        return view('conferences.index', compact('conferences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conference $conference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conference $conference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conference $conference)
    {
        //
    }

    public function favorite(Conference $conference)
    {
        auth()->user()->favoritedConferences()->attach($conference->id);

        return back();
    }

    public function unfavorite(Conference $conference)
    {
        auth()->user()->favoritedConferences()->detach($conference->id);

        return back();
    }
}
