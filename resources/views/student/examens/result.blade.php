@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => ' قائمة  المواد الدراسية'])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">

                    <header> 
                         نتيجة إختبار المادة {{ $matiere }}
                    </header>
                </div>
            </div>
            <div class="card-body">
                <h1 style="    text-align: center;
    font-weight: bold;
    font-size: 10rem !important;">
                    {{ $bareme }} / {{ $note }}
                </h1>
            </div>
        </div>
    </div>
</div>

@endsection
