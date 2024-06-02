@extends('vissionmissionaim-mgmt.base')
@section('action-content')

<section class="content">
    <div class="col-md-12">
        <form role="form" method="POST" action="{{ route('vissionmissionaim-mgmt.update', [$data->id]) }}" >
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Vision Mission Aim History
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
                                            <label>Vision</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                   <textarea class="form-control" rows="3" id="vision_txt"
                                                             name="vision_txt"
                                                             placeholder="Vission"><?php echo htmlspecialchars($data->vision_txt); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Mission</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                   <textarea class="form-control" rows="5" id="mission_txt"
                                                             name="mission_txt"
                                                             placeholder="Mission"><?php echo htmlspecialchars($data->mission_txt); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Aim</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                   <textarea class="form-control" rows="5" id="aim_txt"
                                                             name="aim_txt"
                                                             placeholder="Aim"><?php echo htmlspecialchars($data->aim_txt); ?></textarea>
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
                    <a href="{{ url('vissionmissionaim-mgmt') }}" class=" btn btn-primary " data-toggle="tooltip"  data-placement="left" title="edit">Back</a>
                </div>
                <button type="submit" class="btn btn-primary "> Update</button>
            </div>
        </form>

    </div>

    @endsection