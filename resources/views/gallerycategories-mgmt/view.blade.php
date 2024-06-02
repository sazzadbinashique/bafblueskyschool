@extends('gallerycategories-mgmt.base')
@section('action-content')
<section class="content">
<div class="col-md-12">

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-eye"></i>
                Resource Category Information Detail
            </h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 p-3 px-3">
                        <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th  style="width: 25%">Category Name</th>
                                        <td colspan="5">{{ $data->name }}</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>

                    <div class="col-md-6 p-3 px-3">
                        <table class="table table-sm table-bordered">
                                <tbody>
                                <tr>
                                    <th  style="width: 25%">Remarks</th>
                                    <td colspan="5">{{ $data->remarks }}</td>
                                </tr>

                                </tbody>
                        </table>
                    </div>
                </div>
           </div>
        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                            <a  href="{{ url('gallerycategories-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                            </div>

                        </div>
</div>
</div>
@endsection
