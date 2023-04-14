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
        $subjects = Subject::all();
        return view('admin.dashboard', compact('subjects'));
    }

    public function create() {
        return view('web.pages.subjects.index');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'string|max:255',
            'category' => 'string|max:255',
            'likes' => 'integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $subject = Subject::create([
            'subject' => $request->title,
            'content' => $request->inner_content,
            'category' => $request->category,
            'likes' => $request->likes,
        ]);

        return redirect()->back();
    }

    public function delete($id) {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Subject::findOrFail($id)->delete();

        return redirect()->route('admin');
    }
}
