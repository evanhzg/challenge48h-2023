<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index($cat=null)
    {
        if(!$cat) {
            $subjects = Subject::all();
        }
        else {
            $subjects = Subject::where('category', $cat)->get();
        }
        return view('web.pages.subjects.index', compact('subjects'));
    }

    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        $comments = Comment::where('subject_id', $id)->get();
        return view('web.pages.subjects.show', compact(['subject', 'comments']));
    }

    public function create() {
        return view('subjects.index');
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
            'user_id' => $user->id,
        ]);

        return redirect()->back();
    }

    public function comment($subject, Request $request) {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $comment = Comment::create([
            'comment' => $request->comment,
            'subject_id' => $subject,
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

        return redirect()->route('dashboard');
    }
}
