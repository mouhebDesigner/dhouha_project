@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'قائمة التلاميذ'])
<div class="row">
    <div class="col-md-12">
        <div class="card card-box">
            <div class="card-head">
                <div class="d-flex justify-content-between align-items-center">

                    <header>التلاميذ</header>
                   
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
                                            style="width: 169px;"> الإسم و اللقب </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Department : activate to sort column ascending"
                                            style="width: 180px;"> البريد  الإلكتروني </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Department : activate to sort column ascending"
                                            style="width: 180px;">   هاتف الأب </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Department : activate to sort column ascending"
                                            style="width: 180px;">   إسم الأب </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Mobile : activate to sort column ascending"
                                            style="width: 165px;">  المرحلة التعليمية </th>
                                        <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                            colspan="1" aria-label=" Email : activate to sort column ascending"
                                            style="width: 247px;"> تاريخ الإلتحاق </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr class="gradeX even">
                                        <td class="patient-img">
                                            <img src="{{ asset('assets/img/user/user5.jpg') }}" alt="">
                                        </td>
                                        <td class="left sorting_1">{{ $student->id }}</td>
                                        <td>{{ $student->nom }} {{ $student->prenom }}</td>
                                        <td class="left">{{ $student->email }}</td>
                                        <td class="left">{{ $student->numtel }}</td>
                                        <td class="left">{{ $student->parent_name }}</td>
                                        <td><a href="tel:444543564">
                                                {{ $student->niveau->label }} </a></td>
                                        <td class="left">{{ $student->created_at->format('Y-m-d') }}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
