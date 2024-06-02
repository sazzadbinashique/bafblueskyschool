@extends('weoffer-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('weoffer-mgmt.update', [$data->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Set Offer Message
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
                                            <label>Title</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="offer_title"
                                                           name="offer_title" placeholder="Offer Title" value="{{$data->offer_title}}" required="true"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Offer Detail</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" rows="5" id="offer_detail"
                                                              name="offer_detail"
                                                              placeholder="Offer Detail"><?php echo htmlspecialchars($data->offer_detail); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="image">Image {{ $i }}</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input  type="file" class="custom-file-input" id="image_{{ $i }}" name="images[]">
                                                        <label class="custom-file-label" for="image_{{ $i }}">{{ $data->{'image_' . $i} }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="btn-group mr-2">
                    <a href="{{ url('weoffer-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Update</button>
            </div>
        </form>

    </div>

    @endsection
