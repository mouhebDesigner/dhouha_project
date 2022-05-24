@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => ' قائمة  المواد الدراسية'])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">

                    <header> 
                        إختبارات درس {{ App\Models\Activite::find($activite_id)->lesson->label }}
                    </header>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('activite/'.$activite_id) }}" method="post" style="background: url({{ asset('assets/bg-activite.jpg') }}); background-size: cover;">
                    @csrf
                    @foreach($questions as $question)
                        <div class="row mt-5" >
                            <div class="col-md-12 d-flex flex-column align-items-center">
                                <div class="question" style="background: #006378;
                                        color: white;
                                        width: 100%;
                                        height: 50px;
                                        text-align: center;
                                        line-height: 50px;
                                        font-weight: bold;">{{ $question->question }} ؟</div>
                                @if($question->image)
                                    <img src="{{ asset('images/'.$question->image) }}" width="200" alt="">
                                @endif
                                <input type="hidden" value="{{ $question->id }}" name="question_ids[]">
                            </div>
                        </div>
                        <div class="row mt-5">
                            @if($question->activite->type_prevision == "image")
                                <div class="col-md-12 d-flex flex-row justify-content-center">
                                    @foreach($question->previsions as $key => $reponse)
                                        <div class="reponse">
                                            <input type="radio" class="reponse_input" value="{{ $reponse->id }}" id="reponse{{ $reponse->id }}" name="reponse{{ $question->id }}">
                                            <label class="reponse_label_img" for="reponse{{ $reponse->id }}">
                                                @if($question->activite->type_prevision == "image")
                                                    <img src="{{ asset('images/'.$reponse->description) }}" width="50" alt="">
                                                @else 
                                                    {{ $reponse->description }}
                                                @endif 
                                            </label>
                                        </div>  
                                    @endforeach
                                </div>
                            @endif 

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
