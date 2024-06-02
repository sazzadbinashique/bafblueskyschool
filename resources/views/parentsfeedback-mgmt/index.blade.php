@extends('parentsfeedback-mgmt.base')
@section('action-content')
<!-- Main content -->

<section class="content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class="form-group">
                            <a type="button" href="{{ route('parentsfeedback-mgmt.create') }}" class="btn btn-primary">Create
                                FeedBack</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table id="image_datatable_backend" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Ser</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Suggestion / Comments</th>
                            <th>Gen Reply</th>
                            <!-- <th>Status</th> -->
                            <th>Created By</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $count = 1; @endphp
                        @foreach ($datas as $data)

                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->subject }}</td>
                            <td>{{ $data->comments }}</td>
                            <td>{{ $data->gen_reply }}</td>
                            <!-- <td>
                                @if ($data->email_send_sts == 1)
                                <span class="badge badge-success">Sent</span>
                                @else
                                <span class="badge badge-danger">Not sent</span>
                                @endif
                            </td> -->
                            <td>{{ $data->created_by }}</td>
                            <td>{{ dMY($data->created_at) }}</td>
                            <td style="width: 200px;  text-align: center;">


                               <a class="btn btn-outline-primary btn-sm"
                                       href="{{ route('parentsfeedback-mgmt.show', [$data->id]) }}"  data-placement="left" title="Show">
                                       <i class="fas fa-eye" style="font-size: 12px;color: #0000C0;"></i> View
                                </a>

                                <a class="btn btn-outline-secondary btn-sm" href="{{ route('parentsfeedback-mgmt.edit', [$data->id]) }}" data-placement="left" title="Edit">
                                    <i class="far fa-edit" style="font-size: 12px;color: #0000C0;"></i> Edit
                                </a>
                                <!-- <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')"
                                       href="{{ route('parentsfeedback-mgmt.remove', [$data->id]) }}"
                                       data-placement="left"
                                       title="Cancel">
                                        <i class="fas fa-trash" style="font-size: 12px;color: #7c151f;"></i> Delete
                                    </a> -->

                                <!-- Button trigger modal -->
                                </br>
                                @can('parentsfeedback-list')
                                @if(Auth::user()->name == 'SuperAdmin' || Auth::user()->name == 'BafwwagenAdmin')
                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#sendEmailModal" onclick="setSendEmailModalVal({{$data}})">
                                    <i class="fa fa-envelope-square" style="font-size: 12px;color: #0000C0;"></i>
                                    Reply E-Mail
                                </button>
                                @endif
                                @endcan
                            </td>


                        </tr>
                        @php $count += 1; @endphp
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="sendEmailModal" tabindex="-1" role="dialog" aria-labelledby="sendEmailModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Send mail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('parentsfeedback-mgmt.send.email')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="pId">
                        <div class="form-group">
                            <label for="email">Send to</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Subject</label>
                            <input type="text" class="form-control" placeholder="Enter email subject" name="subject" id="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Suggestion / Comments:</label>
                            <textarea name="comments" class="form-control" rows="5" id="comments" placeholder="Enter comments..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="comment">Gen Reply:</label>
                            <textarea name="gen_reply" class="form-control" rows="3" id="gen_reply" placeholder="Enter Gen Reply..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        function setSendEmailModalVal(data) {
            document.getElementById('pId').value = data.id;
            document.getElementById('email').value = data.email;
            document.getElementById('subject').value = data.subject;
            document.getElementById('comments').value = data.comments;
            document.getElementById('gen_reply').value = data.gen_reply;
        }
    </script>

    @endsection