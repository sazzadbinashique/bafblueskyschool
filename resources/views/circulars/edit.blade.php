@extends('layouts.app')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
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
<div class="row-row" >
    <div class="col-lg-12 margin-tb">
    <div class="navbar" style="background-color:#418BCA;">
        <div class="pull-left" style="color:white">
            <h5><i class="bi bi-person-plus"></i>&nbsp;Nonteachingstaff</h5>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning btn-sm" href="{{ route('nonteachingstaffs.index') }}" ><i class="bi bi-person-lines-fill"></i>&nbsp; Nonteachingstaff List</a>
        </div>
     </div>
       
    </div>
</div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if(Auth::user()->email == 'rootadmin@baf.org')
    <form action="{{ route('nonteachingstaffs.update',$nonteachingstaff->id) }}" method="POST">
    	@csrf


         <div class="row-row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" value="{{ $nonteachingstaff->name }}" placeholder="Name">
		        </div>
		    </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Designation:</strong>
		            <input type="text" name="designation" class="form-control" value="{{ $nonteachingstaff->designation }}" placeholder="Designation">
		        </div>
		    </div>
		   
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
    <div class="pull-right">
            @can('facility-list')
                <a class="btn btn-primary btn-sm" href="{{ route('nonteachingstaffs.index') }}"> Back</a>
            @endcan

            </div>
		</div>
 

    </form>
    @endif

    <script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
@endsection