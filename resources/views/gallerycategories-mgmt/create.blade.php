@extends('gallerycategories-mgmt.base')
@section('action-content')


<section class="content">

    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('gallerycategories-mgmt.store') }}">
            <!-- general form elements disabled -->
            {{ csrf_field() }}
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Gallery Category
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Category Name</label>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Remarks</label>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="remarks" name="remarks" placeholder="" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <div class="btn-group mr-2">
                    <a href="{{ url('gallerycategories-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"
                       data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary toastrDefaultSuccess"> Create</button>
            </div>


        </form>





    </div>

    @endsection

