<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Faculty;
use App\Question;
use App\Subject;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function create()
    {

    }

    public function edit($id)
    {
        $question = Question::find($id);
        $subjects = Faculty::find(Session::get('id'))->subjects()->get();
        $assignment = Assignment::find($question->assignment_id);
        return view('workspace.faculty.assignments.edit')->with(['assignment'=>$assignment,'subjects'=>$subjects,'question'=>$question]);
    }

    public function store(Request $request)
    {
        $question = new Question();
        $question->question = $request->question;
        $question->user_id = Session::get('id');
        $question->assignment_id = $request->assignment_id;
        $question->subject_id = Assignment::find($request->assignment_id)->subject_id;
        $question->imp_lvl = $request->imp_lvl;
        $question->hint = $request->hint;
        $question->save();
        return redirect()->route('assignments.edit',['id'=>$question->assignment_id]);
    }

    public function update($id, Request $request)
    {
        $question = Question::find($id);
        $question->question = $request->question;
        $question->user_id = Session::get('id');
        $question->imp_lvl = $request->imp_lvl;
        $question->hint = $request->hint;
        $question->save();
        return redirect()->route('assignments.edit',['id'=>$question->assignment_id]);
    }

    public function destroy()
    {

    }
}
