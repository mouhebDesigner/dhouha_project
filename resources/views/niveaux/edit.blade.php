@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'تعديل مرحلة تعليمية'])

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header> تعديل مرحلة تعليمية</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form action="{{ route('niveaux.update',['niveau' => $niveau]) }}" method="post">
                    @csrf 
                    @method('put')
                    <div class="form-group @error('label') has-error @enderror">
                        <label class="pull-right" for="simpleFormEmail">إسم المرحلة</label>
                        <input type="text" name="label" class="form-control" value="{{ $niveau->label }}" id="simpleFormEmail" placeholder="إدخال إسم المرحلة">
                        @error('label')
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
