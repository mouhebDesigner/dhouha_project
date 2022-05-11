@extends('layouts.main')

@section('content')
@include('includes.page-header', ['title' => 'محتوى القصة '])
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->

        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-head">
                            <header>محتوى القصة </header>
                        </div>
                        <div class="card-body no-padding height-9">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="activity-list">
                                            @foreach($histoire->pages()->get() as $page)
                                            <li>
                                                <div class="post-box"> 
                                                    <div class="post-img">
                                                        <img src="{{ asset('images/'.$page->image) }}"
                                                            class="img-responsive" alt=""></div>
                                                    <div>
                                                        <audio controls class="mt-2">
                                                            <source src="{{ asset('images/'.$page->vocal) }}" type="audio/ogg">
                                                            <source src="{{ asset('images/'.$page->vocal) }}" type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>


                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
</div>

@endsection
