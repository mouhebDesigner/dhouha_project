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
                <form action="{{ route('activites.store') }}" method="post">
                    @csrf
                    <div class="form-group @error('matiere_id') has-error @enderror">
                        <label for="matiere_id">اختر المادة </label>
                        <select name="matiere_id" class="form-control" id="matiere_id">
                            <option value="" disabled selected>إختر مادة</option>
                            @foreach(App\Models\Matiere::all() as $matiere)
                                <option value="{{ $matiere->id }}" @if(old('niveau') == $matiere->id) selected @endif> {{ $matiere->label }}</option>
                            @endforeach
                        </select>
                        @error('matiere_id')
                            <span class="help-block">{{ $message }}</span>

                        @enderror
                    </div>
                    <div class="form-group @error('type') has-error @enderror">
                        <label for="type"> نوع الإختبار </label>
                        <select name="type" class="form-control" id="type">
                            <option value="" disabled selected>إختر النوع</option>
                            <option value="fill_blank">
                                 إملأ الفراغات
                            </option>
                            <option value="one">
                                 سؤال و إحتمالات
                            </option>
                        </select>
                        @error('type')
                            <span class="help-block">{{ $message }}</span>

                        @enderror
                    </div>
                    <div class="form-group @error('type_prevision') has-error @enderror">
                        <label for="type_prevision"> نوع الإقتراحات </label>
                        <select name="type_prevision" class="form-control" id="type_prevision">
                            <option value="" disabled selected>إختر النوع</option>
                            <option value="image">
                                صور
                            </option>
                            <option value="text">
                                نص
                            </option>
                        </select>
                        @error('type_prevision')
                            <span class="help-block">{{ $message }}</span>

                        @enderror
                    </div>
                    <div class="form-group @error('nbr_prevision') has-error @enderror">
                        <label for="nbr_prevision">عدد الإقتراحات</label>
                        <input type="number" class="form-control" min="2" name="nbr_prevision" id="nbr_prevision">
                        @error('nbr_prevision')
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
