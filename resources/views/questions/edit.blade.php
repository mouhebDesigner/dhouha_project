@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'تعديل سؤال  '])

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header> تعديل سؤال  </header>


            </div>
            <div class="card-body " id="bar-parent">
                <form action="{{ route('admin.questions.update', ['question' => $question]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group @error('question') has-error @enderror">
                        <label for="matiere_id">أدخل محتوى السؤال  </label>
                        <input type="text" name="question" value="{{ $question->question }}" class="form-control" id="simpleFormEmail" placeholder="محتوى السؤال ">
                        @error('question')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <h2>
                        ------------ الإحتمالات------------------------------------------
                    </h2>
                    @foreach($question->previsions()->get() as $i => $prevision)
                        @if($prevision->reponse == 1)
                            @php  $rightAnswer = $i+1; @endphp
                        @endif
                        <div class="form-group @error('description') has-error @enderror">
                            @if($question->activite->type_prevision == 'text')
                                <label for="description{{ $i+1 }}">  محتوى الإحتمال  {{$i+1}}</label>
                                <input type="text" name="description[]" value="{{ $prevision->description }}" class="form-control" id="description{{ $i+1 }}" placeholder="محتوى الإحتمال ">
                            @else 
                                <label for="description{{ $i+1 }}">  محتوى الإحتمال  {{$i+1}}</label>
                                <label for="description{{ $i+1 }}" class="label_file" >
                                    <span id="imageName{{ $i+1 }}"></span>
                                </label>
                                <input type="file" name="description[]" class="form-control" onchange="javascript:updateImage({{$i+1}})"  id="description{{ $i+1 }}" placeholder="محتوى الإحتمال ">
                            @endif
                            @error('description')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach

                    <div class="form-group @error('reponse') has-error @enderror">
                        <label> الإجابة الصحيحة</label>
                        <select class="form-select" name="reponse">
                            <option value="" selected disabled>إختر الإجاتة الصحيحة </option>
                            @for($i = 1; $i <= $question->activite->nbr_prevision;   $i++)
                                <option value="{{ $i }}" @if($i == $rightAnswer) selected @endif>الإقتراح {{ $i }} </option>
                            @endfor
                        </select>
                        @error('reponse')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">تعديل</button>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
