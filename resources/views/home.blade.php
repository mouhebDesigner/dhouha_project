@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'الصفحة الرئيسية'])
<div class="state-overview">
    <div class="row">
        <div class="col-xl-3 col-md-6 col-12">
            <div class="info-box bg-b-white d-flex justify-content-between">
                <div class="info-box-content">
                    <span class="info-box-text" style="font-weight: bold;">التلاميذ</span>
                    <span class="info-box-number" style="font-weight: bold;">{{ App\Models\User::where('role', 'etudiant')->count() }}</span>
                </div>
                <div class="info-box-icon__customized">
                    <img src="{{ asset('assets/img/student.png') }}" alt="">
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="info-box bg-b-white d-flex justify-content-between">
                <div class="info-box-content">
                    <span class="info-box-text" style="font-weight: bold;">أولياء الأمر</span>
                    <span class="info-box-number" style="font-weight: bold;">{{ App\Models\User::where('role', 'parent')->count() }}</span>
                </div>
                <div class="info-box-icon__customized">
                    <img src="{{ asset('assets/img/parents.png') }}" alt="">
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-xl-3 col-md-6 col-12">
            <div class="info-box bg-b-white d-flex justify-content-between">
                <div class="info-box-content">
                    <span class="info-box-text" style="font-weight: bold;">المواد الدراسية</span>
                    <span class="info-box-number" style="font-weight: bold;">{{ App\Models\Matiere::count() }}</span>
                </div>
                <div class="info-box-icon__customized">
                    <img src="{{ asset('assets/img/subjects.png') }}" alt="">
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
</div>

@endsection
