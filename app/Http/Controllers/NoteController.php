<?php

namespace App\Http\Controllers;
use App\Answer;
use App\Question;
use App\Note;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($answer,$question)
    {
        $note = new Note;
        $edit = FALSE;
        return view('noteForm', ['note' => $note,'edit' => $edit, 'answer' =>$answer,'question' => $question ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $question)
    {
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);
        $input = request()->all();
        $answer = Question::find($answer);
        $question = Answer::find($question);
        $note = new Note($input);
        $note->user()->associate(Auth::user());
        $note->answer()->associate($question);
        $note->save();
        return redirect()->route('answers.show',['question_id' => $answer->id,'answer_id' => $question->id])->with('message', 'Saved');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question, $additionalnotes)
    {
        $note = Note::find($note);
        $note->delete();
        return redirect()->route('answers.show',['question_id' => $question,'answer_id' => $answer])->with('message', 'Delete');
    }

}
