@extends('ourservicecategories-mgmt.base')
@section('action-content')
<section class="content">
<section class="content">

<div class="col-md-12">
        <form role="form" method="POST" action="{{ route('ourservicecategories-mgmt.update', [$Data->id]) }}" >
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Category Name</label>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $Data->name }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Remarks</label>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="remarks" name="remarks" placeholder="" value="{{ $Data->remarks }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



            <div class="card-footer">
                <div class="col-md-6 col-md-offset-4">
                <div class="btn-group mr-2">
                    <a href="{{ url('ourservicecategories-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"
                       data-placement="left" title="edit">Back</a>
                </div>
                    <button type="submit" class="btn btn-primary">
                                    Update
                    </button>
                </div>
            </div>

        </form>

@endsection


</div>
