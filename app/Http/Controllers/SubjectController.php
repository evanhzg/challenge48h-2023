<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::get();
        return view('web.pages.subjects.index', compact('subjects'));
    }
}
