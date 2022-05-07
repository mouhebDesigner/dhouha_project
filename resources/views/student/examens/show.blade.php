@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => ' قائمة  المواد الدراسية'])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">

                    <header> 
                        إختبارات مادة
                    </header>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('activite/'.$activite_id) }}" method="post">
                    @csrf
                    @foreach($questions as $question)
                        <div class="row mt-5">
                            <div class="col-md-8 offset-md-2">
                                <div class="question">{{ $question->question }} ؟</div>
                                <input type="hidden" value="{{ $question->id }}" name="question_ids[]">
                            </div>
                        </div>
                        <div class="row mt-5">
                            @foreach($question->previsions as $key => $reponse)
                            <div class="col-md-8 offset-md-2">
                                <div class="reponse">

                                    <input type="radio" value="{{ $reponse->id }}" id="reponse{{ $reponse->id }}" name="reponse{{ $question->id }}">
                                    <label for="reponse{{ $reponse->id }}">
                                        @if($question->activite->type_prevision == "image")
                                            <img src="{{ asset('images/'.$reponse->description) }}" width="50" alt="">
                                        @else 
                                            {{ $reponse->description }}
                                        @endif 
                                    </label>
                                </div>  
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                    <div class="row mt-5">
                        <div class="col-md-8 offset-md-2">
                            <input type="submit" class="button_quiz" value="بعث">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
