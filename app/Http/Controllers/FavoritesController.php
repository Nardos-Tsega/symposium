<?php

namespace App\Http\Controllers;

class FavoritesController extends Controller
{
    public function index()
    {
        return view('favorites.index');
    }
}
