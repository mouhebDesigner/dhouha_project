@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'قائمة المراحل التعليمية'])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">

                    <header>المراحل التعليمية
                    </header>
                    <a href="{{ route('admin.niveaux.create') }}" id="addRow" class="btn btn-primary btn-primary__customized">
                        <i class="fa fa-plus"></i>
                    </a>
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
                                            style="width: 169px;"> إسم المرحلة </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Action : activate to sort column ascending"
                                            style="width: 116px;"> الإجراءات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($niveaux as $niveau)
                                    <tr class="gradeX even">
                                        <td class="patient-img">
                                            <img src="{{ asset('assets/img/user/user5.jpg') }}" alt="">
                                        </td>
                                        <td class="left sorting_1">{{ $niveau->id }}</td>
                                        <td>{{ $niveau->label }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around align-items-center">
                                                <div>
                                                    <a href="{{ url('admin/niveaux/'.$niveau->id.'/edit') }}" class="edit-confirm tblEditBtn">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </div>
                                                <button type="submit" data-url="{{ url('admin/niveaux/'.$niveau->id) }}" class="delete-confirm tblDelBtn" style="border: none">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        
                        {{ $niveaux->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
