@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => ' قائمة  المواد الدراسية'])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">

                    <header> 
                        إختبارات مادة {{ $examens->first()->matiere->label }}
                    </header>
                </div>
            </div>
            <div class="card-body">
                <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            
                        </div>
                    </div>
                    <div class="row">
                        @foreach($examens as $key => $examen)

                        @if(App\Models\Resultat::where('activite_id', $examen->id)->where('user_id', Auth::user()->child->id)->count() > 0)
                            <a href="{{ url('activite/'.$examen->id.'/result') }}" title="عرض الإختبارات" class="matiere_block"> 
                                <i class="fa-solid fa-check" style="    position: relative;
                                        left: -114px;
                                        bottom: 20px;
                                        transform: scale(1.5);"></i>
                                        
                        @else 
                        <a href="#" title="عرض الإختبارات" class="matiere_block"> 
                            <i class="fa-solid fa-circle-xmark" style="    position: relative;
                                        left: -114px;
                                        bottom: 20px;
                                        color: rgb(163, 33, 33);
                                        transform: scale(1.5);"></i>
                        @endif
                                <img src="{{ asset('assets/img/examen.png') }}" width="50" height="50" alt="">
                                <span>الإختبار {{ $key+1 }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
