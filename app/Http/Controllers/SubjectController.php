<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::get();
        return view('admin.dashboard', compact('subjects'));
    }

    public function create() {
        return view('web.pages.subjects.index');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $subject = Subject::create([
            'subject' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('subject.index');
    }
}
