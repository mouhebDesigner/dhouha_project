@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'إضافة مرحلة تعليمية'])

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header> إضافة مرحلة تعليمية</header>
               
                
            </div>
            <div class="card-body " id="bar-parent">
                <form action="{{ route('subjects.update', ['subject'=> $matiere]) }}" method="post">
                    @csrf 
                    @method('put')
                    <div class="form-group @error('label') has-error @enderror">
                        <label class="pull-right" for="simpleFormEmail">إسم المادة</label>
                        <input type="text" name="label" value="{{ $matiere->label }}" class="form-control" id="simpleFormEmail" placeholder="إدخال إسم المرحلة">
                        @error('label')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('niveau_id') has-error @enderror">
                        <label>المرحلة التعليمية</label>
                        <select class="form-select" name="niveau_id">
                            <option selected disabled>إختيار مرحلة</option>
                            @foreach(App\Models\Niveau::all() as $niveau)
                                <option value="{{ $niveau->id }}" @if( $matiere->niveau_id  == $niveau->id) selected @endif> {{ $niveau->label }}</option>
                            @endforeach
                        </select>
                        @error('niveau_id')
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
