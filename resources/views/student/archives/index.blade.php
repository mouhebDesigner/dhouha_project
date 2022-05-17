@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => ' قائمة الإختبارات المجتازة '])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">

                    <header> 
                        الإختبارات المجتازة
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
                                        <th class="sorting sorting_desc" tabindex="0" aria-controls="example4"
                                            rowspan="1" colspan="1"
                                            aria-label=" Roll No : activate to sort column ascending"
                                            style="width: 126px;" aria-sort="descending"> # </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Name : activate to sort column ascending"
                                            style="width: 169px;">  الإختبار </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Name : activate to sort column ascending"
                                            style="width: 169px;"> إسم المادة </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Name : activate to sort column ascending"
                                            style="width: 169px;"> إسم الدرس </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Name : activate to sort column ascending"
                                            style="width: 169px;">  النتيجة </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Name : activate to sort column ascending"
                                            style="width: 169px;">  المقياس </th>
                                        
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Auth::user()->resultats()->get() as $key => $result)
                                    <tr class="gradeX even">
                                        <td class="left sorting_1">{{ $result->id }}</td>
                                        <td>
                                            الإختبار {{ $key+1 }}
                                        </td>
                                        <td>{{ $result->activite->lesson->matiere->label }}</td>
                                        <td>{{ $result->activite->lesson->label }}</td>
                                        <td>{{ $result->note }}</td>
                                        <td>{{ $result->bareme }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
