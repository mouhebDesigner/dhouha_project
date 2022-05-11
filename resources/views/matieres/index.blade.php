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
                    <a href="{{ route('admin.matieres.create') }}" id="addRow" class="btn btn-primary btn-primary__customized">
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
                                        <th class="sorting sorting_desc" tabindex="0" aria-controls="example4"
                                            rowspan="1" colspan="1"
                                            aria-label=" Roll No : activate to sort column ascending"
                                            style="width: 126px;" aria-sort="descending"> # </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Name : activate to sort column ascending"
                                            style="width: 169px;"> إسم المادة </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Name : activate to sort column ascending"
                                            style="width: 169px;"> إسم المرحلة </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Action : activate to sort column ascending"
                                            style="width: 116px;"> الإجراءات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($matieres as $matiere)
                                    <tr class="gradeX even">
                                        <td class="left sorting_1">{{ $matiere->id }}</td>
                                        <td>{{ $matiere->label }}</td>
                                        <td>{{ $matiere->niveau->label }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around align-items-center">
                                                <div>
                                                    <a href="{{ url('admin/matieres/'.$matiere->id.'/edit') }}" class="edit-confirm tblEditBtn">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </div>
                                                <button type="submit" data-url="{{ url('admin/matieres/'.$matiere->id) }}" class="delete-confirm tblDelBtn" style="border: none">
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
                        
                        {{ $matieres->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
