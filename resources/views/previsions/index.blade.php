@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => ' قائمة   الأسئلة'])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">

                    <header> 
                          إحتمالات السؤال
                    </header>
                   
                </div>
            </div>
            <div class="card-body ">
                <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table
                                class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer"
                                id="example4" aria-describedby="example4_info" style="width: 1581px;">
                                <thead>
                                    <tr>  
                                        <th>   الإحتمالات  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($previsions as $prevision)
                                    <tr class="gradeX even">
                                        <td>
                                            @if($prevision->question->activite->type_prevision == "image")
                                                <img src="{{ asset('images/'.$prevision->description) }}" width="50" alt="">
                                            @else 
                                                {{ $prevision->description }}
                                            @endif
                                        </td>
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
