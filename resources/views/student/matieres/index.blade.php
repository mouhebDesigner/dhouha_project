@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => ' قائمة  المواد الدراسية'])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">
                    <header> 
                         المواد الدراسية
                    </header>
                </div>
            </div>
            <div class="card-body ">
                <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            
                        </div>
                    </div>
                    <div class="row">
                        @foreach($matieres as $matiere)
                            <a href="{{ url('matiere/'.$matiere->id.'/examens') }}" title="عرض الإختبارات" class="matiere_block"> 
                                <img src="{{ asset('assets/img/subject.png') }}" width="50" height="50" alt="">
                                <span>{{ $matiere->label }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
