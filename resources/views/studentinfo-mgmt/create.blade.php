@extends('studentinfo-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('studentinfo-mgmt.store') }}" enctype="multipart/form-data">
            <!-- general form elements disabled -->
            {{ csrf_field() }}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Student Info
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <!-- <label>Title</label> -->
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="title"
                                                           name="name" placeholder="name" value="" required="true">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="student_id"
                                                           name="student_id" placeholder="student_id" value="" required="true">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="email"
                                                           name="email" placeholder="email" value="" required="true">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="class"
                                                           name="class" placeholder="class" value="" required="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-footer">
                <div class="btn-group mr-2">
                    <a href="{{ url('studentinfo-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"
                       data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Submit</button>
            </div>

        </form>


    </div>

    @endsection

