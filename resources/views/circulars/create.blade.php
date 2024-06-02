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
            <h5><i class="bi bi-person-plus"></i>&nbsp;Circular</h5>
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
    <form action="/circulars" method="POST" enctype="multipart/form-data">
    	@csrf
         <div class="row-row">
		    
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
                <strong>Title: *</strong>
                <input type="text" name="name" class="form-control" placeholder="Title" required="true">
		        </div>
		    </div>
            
		 
          
            <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="file" name="file" class="form-control">
            </div>
   
                <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div> -->
   
           </br></br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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