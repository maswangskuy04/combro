<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profile;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /*
    * Display a listing of the resource.
    */
    public function index()
    {
        $profiles = Profile::where('status', 1)->first();
        $experiences = Experience::where('id_profile', 1)->first();
        return view('layouts3.index', compact('profiles', 'experiences'));
    }

    /**
     * Show the form for creating a new resource
     */
}
