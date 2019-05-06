@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Answer</div>
                    <div class="card-body">
                        {{$answer->body}}
                    </div>
                    <div class="card-footer">
                        {{ Form::open(['method'  => 'DELETE', 'route' => ['answers.destroy', $question, $answer->id]])}}
                        <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                        <a class="btn btn-primary float-right" href="{{ route('answers.edit',['question_id'=> $question, 'answer_id'=> $answer->id, ])}}">
                            Edit Answer
                        </a>
                    </div>
                </div>
                <br>
                <div class="card">

                    <div class="card-header">
                        <h4 class="float-left"><b><i>Extra Notes:</i></b></h4>
                        <a class="btn btn-primary float-right"
                           href="{{ route('notes.create', ['answer_id'=> $answer->id,'question_id'=> $question])}}">
                            Add Extra Note
                        </a></div>
                </div>


                {{--
                                Extra notes displayed here
                --}}

                @foreach($note as $notes)
                    <div class="card">
                        <div class="card-header">{{\App\User::find($notes->user_id)->email}}</div>
                        <div class="card-body">
                            {{$notes->body}}
                        </div>
                        <div class="card-footer">
                            @if(Auth::user() == $notes->user)
                                {{ Form::open(['method'  => 'DELETE', 'route' => ['notes.destroy', $question, $answer, $notes->id]])}}
                                <button class="btn btn-outline-danger" value="submit" type="submit" id="submit">Delete the Note
                                </button>
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection