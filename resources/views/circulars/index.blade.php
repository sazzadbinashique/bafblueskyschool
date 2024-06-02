@extends('layouts.app')
<style>
.row-row {
    display: flex;
    flex-wrap: wrap;
    background: lavender;
    margin-right: 16.5px;
    margin-left: 266.5px;
    
}
</style>

@section('content')
<div class="row-row">
    <div class="col-lg-12 margin-tb">
      <div class="navbar" style="background-color:#418BCA;">
        <div class="pull-left" style="color:white">
            <h5><i class="bi bi-people-fill"></i>&nbsp;Circular List</h5>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning btn-sm" href="{{ route('circulars.create')}}" ><i class="bi bi-plus-square"></i>&nbsp; Add New Circulars</a>
        </div>
     </div>
    </div>
</div>
 

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row-row">

    <table class="table table-bordered">
    <tr>
            <th>SL</th>
            <th>Title</th>
            <th>Publish Date</th>
            <th>File Download</th>
            <th width="280px">Action</th>
           
        </tr>
	    @foreach ($circulars as $circular)
	    <tr>
	        <td>{{ ++$i }}</td>
            <td>{{ $circular->name}}</td>
            <td>{{ $circular->created_at }}</td>
            <td><a href="/uploads/{{$circular->file}}" download="{{$circular->file}}">{{$circular->file}}</a><td>
	       
            @if(Auth::user()->email == 'rootadmin@baf.org')
            <form action="{{ route('circulars.destroy',$circular->id) }}" method="POST">
                    <a class="btn btn-info btn-sm" href="{{ route('circulars.show',$circular->id) }}">Show</a> &nbsp;&nbsp;
                    
                    <!-- <a class="btn btn-primary btn-sm" href="{{ route('circulars.edit',$circular->id) }}">Edit</a> -->
                 


                    @csrf
                    @method('DELETE')
                   
                    @can('facility-list')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    @endcan
                    
            </form>
            @endif
	        
	    </tr>
	    @endforeach
    </table>
</div>

    {!! $circulars->links() !!}

@endsection