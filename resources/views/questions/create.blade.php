@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'إضافة سؤال  '])

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header> إضافة سؤال  </header>


            </div>
            <div class="card-body " id="bar-parent">
                <form action="{{ route('admin.questions.store', ['id' => $activite_id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group @error('question') has-error @enderror">
                        <label for="matiere_id">أدخل محتوى السؤال  </label>
                        <input type="text" name="question" class="form-control" id="simpleFormEmail" placeholder="محتوى السؤال ">
                        @error('question')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <h2>
                        ------------ الإحتمالات---------------------------------------------------------------------------------------------
                    </h2>
                    @for($i = 1; $i <= App\Models\Activite::find($activite_id)->nbr_prevision;   $i++)
                        <div class="form-group @error('description') has-error @enderror">
                            @if(App\Models\Activite::find($activite_id)->type_prevision == 'text')
                                <label for="description{{ $i }}">  محتوى الإحتمال  {{$i}}</label>
                                <input type="text" name="description[]" class="form-control" id="description{{ $i }}" placeholder="محتوى الإحتمال ">
                            @else 
                                <label for="description{{ $i }}">  محتوى الإحتمال  {{$i}}</label>
                                <label for="description{{ $i }}" class="label_file" >
                                    <span id="imageName{{ $i }}"></span>
                                </label>
                              
                                <input type="file" name="description[]" class="form-control" onchange="javascript:updateImage({{$i}})"  id="description{{ $i }}" placeholder="محتوى الإحتمال ">

                            @endif
                            @error('description')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    @endfor

                    <div class="form-group @error('reponse') has-error @enderror">
                        <label> الإجابة الصحيحة</label>
                        <select class="form-select" name="reponse">
                            <option value="" selected disabled>إختر الإجاتة الصحيحة </option>
                            @for($i = 1; $i <= App\Models\Activite::find($activite_id)->nbr_prevision;   $i++)
                                <option value="{{ $i }}">الإقتراح {{ $i }} </option>
                            @endfor
                        </select>
                        @error('reponse')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">إضافة</button>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
