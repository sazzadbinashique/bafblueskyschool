@extends('layouts.app')


@section('content')
<div class="row-row">
    <div class="col-lg-12 margin-tb">
         
        <div class="navbar" style="background-color:#418BCA;">
                <div class="pull-left" style="color:white">
                    <h5><i class="bi bi-people-fill"></i>&nbsp;Circular Details</h5>
                </div>
                <div class="pull-right">
                    <a class="btn btn-warning btn-sm" href="{{ route('circulars.create') }}" ><i class="bi bi-plus-square"></i>&nbsp; Add New Circulars</a>
                    &nbsp;<a class="btn btn-warning btn-sm" href="{{ route('circulars.index') }}" ><i class="bi bi-person-lines-fill"></i>&nbsp; Circulars List</a>
                </div>
        </div>
      
    </div>
</div>

 
    <div class="row-row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $circular->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Publish Date:</strong>
                {{ $circular->created_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File:</strong>
                <a href="/uploads/{{$circular->file}}" download="{{$circular->file}}">{{$circular->file}}</a>

            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
           
            <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('circulars.index') }}"> Back</a>
        </div>
        </div>
    </div>
@endsection