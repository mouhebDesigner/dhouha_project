@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'تعديل ولي أمر'])

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>تعديل ولي أمر</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form action="{{ route('parents.update', ['parent' => $parent]) }}" method="post">
                    @csrf  
                    @method('put')
                    <input type="hidden" value="etudiant" name="role">
                    <div class="form-group @error('nom') has-error @enderror">
                        <label class="pull-right" for="simpleFormEmail">الإسم</label>
                        <input type="text" name="nom" value="{{ $parent->nom }}"  class="form-control" id="simpleFormEmail" placeholder="إدخال الإسم">
                        @error('nom')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('prenom') has-error @enderror">
                        <label class="pull-right" for="simpleFormEmail">اللقب</label>
                        <input type="text" name="prenom" value="{{ $parent->prenom }}" class="form-control" id="simpleFormEmail" placeholder="إدخال اللقب">
                        @error('prenom')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group @error('email') has-error @enderror">
                        <label class="pull-right" for="simpleFormEmail">البريد الإلكتروني</label>
                        <input type="email" name="email" value="{{ $parent->email }}" class="form-control" id="simpleFormEmail" placeholder="إدخال البريد الإلكتروني">
                        @error('email')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group       @error('date_naissance') has-error @enderror"> 
                        <label class="pull-right" for="simpleFormEmail">تاريخ الولادة</label>
                        <input type="date" name="date_naissance" value="{{ $parent->date_naissance }}" class="form-control" id="simpleFormEmail">
                        @error('date_naissance')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="role" value="etudiant">
                    <div class="form-group @error('genre') has-error @enderror">
                        <label>الجنس</label>
                        <select class="form-select" name="genre">
                            <option>إختيار الجنس</option>
                           <option value="male" @if($parent->genre == "male") selected @endif>ذكر</option>
                           <option value="female" @if($parent->genre == "female") selected @endif>أنثى</option>
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

                    <button type="submit" class="btn btn-primary pull-right">تعديل</button>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection
