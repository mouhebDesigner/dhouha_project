@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => ' قائمة   الإختبارات'])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">

                    <header> 
                          الإختبارات
                    </header>
                    <a href="{{ route('activites.create') }}" id="addRow" class="btn btn-primary btn-primary__customized">
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
                                        
                                        <th>نوع الإختبار</th>
                                        <th>نوع الإقتراحات</th>
                                        <th>  المرحلة  </th>
                                        <th>  المادة  </th>
                                        <th>  عدد الأسئلة </th>
                                        @if(Auth::user()->grade == 'admin')
                                        <th>  قائمة الإجتيازات </th>
                                        @endif
                                        <th>الإجراءات </th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activites as $activite)
                                    <tr class="gradeX even">
                                        <td class="left sorting_1">
                                            @if( $activite->type  == "one")
                                                إحتمال واحد
                                            @else 
                                                ملأ الفراغات    
                                            @endif
                                        </td>
                                        <td>
                                            @if( $activite->type_prevision ==  'image' )
                                                صور
                                            @else
                                            نص
                                            @endif
                                        </td>
                                        <td>{{ $activite->matiere->niveau->label }}</td>
                                        <td>{{ $activite->matiere->label }}</td>
                                        <td>{{ $activite->questions()->count() }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around align-items-center">
                                                <a href="{{ url('activites/'.$activite->id.'/questions') }}" class="btn btn-primary">
                                                    عرض الأسئلة
                                                </a>
                                                <div>
                                                    <a href="{{ url('activite/'.$activite->id.'/edit') }}" class="edit-confirm tblEditBtn">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </div>
                                                <button type="submit" data-url="{{ url('activite/'.$activite->id) }}" class="delete-confirm tblDelBtn" style="border: none">
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
                        
                        {{ $activites->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
