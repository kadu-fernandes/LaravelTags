<?php

namespace App\Http\Controllers;

use App\Models\TrackedTag;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $trackedTags = TrackedTag::all();

        return view('main.index');
    }
}
