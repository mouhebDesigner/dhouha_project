@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'قائمة القصص '])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">

                    <header>القصص 
                    </header>
                    @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.histoires.create') }}" id="addRow" class="btn btn-primary btn-primary__customized">
                        <i class="fa fa-plus"></i>
                    </a>
                    @endif
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
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=": activate to sort column ascending"
                                            style="width: 40px;"></th>
                                        <th class="sorting sorting_desc" tabindex="0" aria-controls="example4"
                                            rowspan="1" colspan="1"
                                            aria-label=" Roll No : activate to sort column ascending"
                                            style="width: 126px;" aria-sort="descending"> # </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Name : activate to sort column ascending"
                                            style="width: 169px;">  عنوان القصة </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Action : activate to sort column ascending"
                                            style="width: 116px;"> الإجراءات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($histoires as $histoire)
                                    <tr class="gradeX even">
                                        <td class="patient-img">
                                            <img src="{{ asset('assets/img/user/user5.jpg') }}" alt="">
                                        </td>
                                        <td class="left sorting_1">{{ $histoire->id }}</td>
                                        <td>{{ $histoire->titre }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around align-items-center">
                                                <div>
                                                    <a href="{{ asset("images/".$histoire->file) }}" target="_blank" class="tblEditBtn">
                                                        عرض القصة
                                                    </a>
                                                </div>
                                                @if(Auth::user()->isAdmin())
                                                <button type="submit" data-url="{{ url('admin/histoires/'.$histoire->id) }}" class="delete-confirm tblDelBtn" style="border: none">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                @endif
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        
                        {{ $histoires->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
