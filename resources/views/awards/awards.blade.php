<div class="h">
@extends('layouts.app')
</div>

@section('content')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


    <style type="text/css">
        .roww {
    display: flex;
    flex-wrap: wrap;
    background: lavender;
    margin-right: 4.5px;
    margin-left: 251.5px;
    
}
.test {
    padding-left: 18px;
}
.navbar-nav>li>a {
    line-height: 20px;
    margin-left: 1063px;
}
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon{
    	border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
    .form-image-upload{
        background: #e8e8e8 none repeat scroll 0 0;
        padding: 15px;
    }
img {
    width: 400px !important;
    height: 130px !important;
}
.container{
    width: 100%;
    padding-left: 15%;
}
@media (max-width:770){
    .container{
    width: 100%;
    padding-left: 0;
}
}
@media screen and (max-width:580px)
{
    .navbar-nav>li>a {
    line-height: 20px;
    margin-left: 0;
    }
    .mar-left{
    margin-left: 2%;
    }
}
    </style>
</head>
<body>


<div class="container ">

     <div class="row"><h3>Awards</h3></div>

      <div class="row">
      @if(Auth::user()->email == 'rootadmin@baf.org')
      <form action="{{ url('awards') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">


        {!! csrf_field() !!}


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif


        <div class="row">
            <div class="col-md-5"><br>
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="col-md-5"><br>
                <strong>Image: <span style="color:red;">MAX 5 MB</span></strong>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-2"><br>
                <br/>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>


      </form> 
      @endif
     </div>

     </br>
    <div class="row">
    <div class='list-group gallery'>

    <div class="row">
            @if($awards->count())
                @foreach($awards as $award)
                <div class='col-sm-4 col-xs-6 col-md-5 col-lg-5 m-1'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $award->image }}">
                        <img class="img-responsive" alt="" src="/images/{{ $award->image }}"/>
                        <div class='text-center'>
                            <small class='text-muted'>{{ $award->title }}</small>
                        </div> <!-- text-center / end -->
                    </a>
                    <form action="{{ url('awards',$award->id) }}" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    {!! csrf_field() !!}
                    <button type="submit" class="close-icon btn btn-danger text-right"><i class="glyphicon glyphicon-remove">x</i></button>
                    </form>
                </div> <!-- col-6 / end -->
                @endforeach
            @endif
     </div>

        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->





<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
@endsection