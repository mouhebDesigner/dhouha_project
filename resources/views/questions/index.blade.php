@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => ' قائمة   الأسئلة'])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">

                    <header> 
                          الأسئلة
                    </header>
                    <a href="{{ route('admin.questions.create', ['id' => $activite_id]) }}" id="addRow" class="btn btn-primary btn-primary__customized">
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
                                        <th>  السؤال  </th>
                                        <th>  عدد الإقتراحات </th>
                                        <th>الإجراءات </th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($questions as $question)
                                    <tr class="gradeX even">
                                        
                                        <td>{{ $question->question }}</td>
                                        <td>{{ $question->previsions()->count() }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around align-items-center">
                                                <a href="{{ url('admin/questions/'.$question->id.'/previsions') }}" class="btn btn-primary">
                                                    عرض الإقتراحات
                                                </a>
                                                <div>
                                                    <a href="{{ url('admin/questions/'.$question->id.'/edit') }}" class="edit-confirm tblEditBtn">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </div>
                                                <button type="submit" data-url="{{ url('admin/questions/'.$question->id) }}" class="delete-confirm tblDelBtn" style="border: none">
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
                        
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
