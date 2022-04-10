@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'إضافة تلميذ'])

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>إضافة تلميذ</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form action="{{ route('students.store') }}" method="post">
                    @csrf 
                    <input type="hidden" value="etudiant" name="role">
                    <div class="form-group @error('nom') has-error @enderror">
                        <label class="pull-right" for="simpleFormEmail">الإسم</label>
                        <input type="text" name="nom" value="{{old('nom')}}" class="form-control" id="simpleFormEmail" placeholder="إدخال الإسم">
                        @error('nom')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('prenom') has-error @enderror">
                        <label class="pull-right" for="simpleFormEmail">اللقب</label>
                        <input type="text" name="prenom" value="{{old('prenom')}}" class="form-control" id="simpleFormEmail" placeholder="إدخال اللقب">
                        @error('prenom')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('niveau_id') has-error @enderror">
                        <label>المرحلة التعليمية</label>
                        <select class="form-select" name="niveau_id">
                            <option selected disabled>إختيار مرحلة</option>
                            @foreach(App\Models\Niveau::all() as $niveau)
                                <option value="{{ $niveau->id }}" @if(old('niveau') == $niveau->id) selected @endif> {{ $niveau->label }}</option>
                            @endforeach
                        </select>
                        @error('niveau_id')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group @error('email') has-error @enderror">
                        <label class="pull-right" for="simpleFormEmail">البريد الإلكتروني</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="simpleFormEmail" placeholder="إدخال البريد الإلكتروني">
                        @error('email')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group       @error('date_naissance') has-error @enderror"> 
                        <label class="pull-right" for="simpleFormEmail">تاريخ الولادة</label>
                        <input type="date" name="date_naissance" value="{{old('date_naissance')}}" class="form-control" id="simpleFormEmail">
                        @error('date_naissance')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="role" value="etudiant">
                    <div class="form-group @error('genre') has-error @enderror">
                        <label>الجنس</label>
                        <select class="form-select" name="genre">
                            <option>إختيار الجنس</option>
                           <option value="male" @if(old('genre') == "male") selected @endif>ذكر</option>
                           <option value="female" @if(old('genre') == "male") selected @endif>أنثى</option>
                        </select>
                        @error('genre')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('password') has-error @enderror">
                        <label class="pull-right" for="simpleFormPassword">كلمة السر</label>
                        <input type="password" name="password" class="form-control" id="simpleFormPassword" placeholder="إدخال كلمة السر">
                        @error('password')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="pull-right" for="simpleFormPassword">تأكيد كلمة السر</label>
                        <input type="password" name="password_confirmation" class="form-control" id="simpleFormPassword" placeholder="تأكيد كلمة السر">
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">إضافة</button>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
