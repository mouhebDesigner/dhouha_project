@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'إضافة قصة'])

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header> إضافة قصة</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form action="{{ route('admin.histoires.store') }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group @error('titre') has-error @enderror">
                        <label class="pull-right" for="simpleFormEmail">إسم القصة</label>
                        <input type="text" name="titre" class="form-control" id="simpleFormEmail" placeholder="إدخال إسم القصة">
                        @error('titre')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group @error('titre') has-error @enderror">
                        <label for="image" class="label_file" >
                            <span id="imageName"></span>
                        </label>
                        
                        <input type="file" name="image[]" class="form-control" onchange="javascript:updateImage()"  id="image" placeholder="محتوى الإحتمال ">
                    </div>
                    <div class="form-group @error('vocal') has-error @enderror">
                        <label for="vocal" class="label_file vocal" >
                            <span id="imageName"></span>
                        </label>
                        
                        <input type="file" name="vocal[]" class="form-control" onchange="javascript:updateImage()"  id="vocal" placeholder="محتوى الإحتمال ">
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">إضافة</button>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
