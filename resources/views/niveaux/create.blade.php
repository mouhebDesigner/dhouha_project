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
                <form action="{{ route('admin.niveaux.store') }}" method="post">
                    @csrf 
                    <div class="form-group @error('label') has-error @enderror">
                        <label class="pull-right" for="simpleFormEmail">إسم المرحلة</label>
                        <input type="text" name="label" class="form-control" id="simpleFormEmail" placeholder="إدخال إسم المرحلة">
                        @error('label')
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
