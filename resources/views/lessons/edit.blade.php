@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'إضافة درس '])

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header> إضافة  درس</header>
               
                
            </div>
            <div class="card-body " id="bar-parent">
                <form action="{{ route('admin.lessons.update', ['lesson' => $lesson]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group @error('label') has-error @enderror">
                        <label class="pull-right" for="simpleFormEmail">إسم الدرس</label>
                        <input type="text" name="label" value="{{ $lesson->label }}" class="form-control" id="simpleFormEmail" placeholder="إدخال إسم الدرس">
                        @error('label')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('matiere_id') has-error @enderror">
                        <label for="niveau_id">اختر المرحلة </label>
                        <select name="niveau_id" class="form-control" id="niveau_id">
                            <option value="" disabled selected>إختر المرحلة</option>
                            @foreach(App\Models\Niveau::all() as $niveau)
                                <option value="{{ $niveau->id }}" @if($lesson->matiere->niveau->id == $niveau->id) selected @endif> {{ $niveau->label }}</option>
                            @endforeach
                        </select>
                        @error('niveau_id')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('matiere_id') has-error @enderror">
                        <label for="matiere_id">اختر المادة </label>
                        <select name="matiere_id" class="form-control" id="matiere_id">
                            <option value="" disabled selected>إختر مادة</option>
                            @foreach(App\Models\Matiere::where('niveau_id', $lesson->matiere->niveau->id)->get() as $matiere)
                                <option value="{{ $matiere->id }}" @if($lesson->matiere->niveau->id == $matiere->id) selected @endif> {{ $matiere->label }}</option>
                            @endforeach
                        </select>
                        @error('matiere_id')
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
