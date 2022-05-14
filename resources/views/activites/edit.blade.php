@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'تعديل نشاط'])

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header> تعديل  نشاط</header>


            </div>
            <div class="card-body " id="bar-parent">
                <form action="{{ route('admin.activites.update', ['activite' => $activite]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group @error('matiere_id') has-error @enderror">
                        <label for="niveau_id">اختر المرحلة </label>
                        <select name="niveau_id" class="form-control" id="niveau_id">
                            <option value="" disabled selected>إختر المرحلة</option>
                            @foreach(App\Models\Niveau::all() as $niveau)
                                <option value="{{ $niveau->id }}" @if($activite->matiere->niveau->id == $niveau->id) selected @endif> {{ $niveau->label }}</option>
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
                            @foreach(App\Models\Matiere::where('niveau_id', $activite->matiere->niveau->id)->get() as $matiere)
                                <option value="{{ $matiere->id }}" @if($activite->matiere->niveau->id == $matiere->id) selected @endif> {{ $matiere->label }}</option>
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
                            <option value="fill_blank" @if($activite->type == "fill_blank") selected @endif>
                                 إملأ الفراغات
                            </option>
                            <option value="one" @if($activite->type == "one") selected @endif>
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
                            <option value="image" @if($activite->type_prevision == "image") selected @endif>
                                صور
                            </option>
                            <option value="text" @if($activite->type_prevision == "text") selected @endif>
                                نص
                            </option>
                        </select>
                        @error('type_prevision')
                            <span class="help-block">{{ $message }}</span>

                        @enderror
                    </div>
                    <div class="form-group @error('nbr_prevision') has-error @enderror">
                        <label for="nbr_prevision">عدد الإقتراحات</label>
                        <input type="number" value="{{ $activite->nbr_prevision }}" class="form-control" min="2" name="nbr_prevision" id="nbr_prevision">
                        @error('nbr_prevision')
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
