@extends("admin.layout")

@section("content")
<div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>New Apps
                <small class="text-muted">Welcome to HunStreet Application</small>
                </h2>
            </div>
            
        </div>
    </div>

        <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                    <h4>List Invitations</h4>

                    </div>
                </div>
            </div>
        </div>



        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                       
                        <ul class="header-dropdown">
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <!-- <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="body">


                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Admin Sender</th>
                                    <th>Email</th>
                                    <th>Token Invitation</th>
                                    <th>Status Invitation</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                            @foreach($inv as $inv)

                            <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$inv->adminName}}</td>
                        <td>{{$inv->invitationEmail}}</td>
                        <td>{{$inv->link_token}}</td>
                        <td>{{$inv->invitationStatus}}</td>
                        <td>{{$inv->created_at}}</td>

</tr>

                                @endforeach              
                            </tbody>
                        </table>
                        <button type="button" class="btn  btn-raised btn-success waves-effect" data-toggle="modal" data-target="#invitationModal"><b>Create New Invitation</b></button>

                    </div>
                </div>
            </div>
        </div>
    </div>



   

<div class="modal fade" id="invitationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"   id="largeModalLabel">Send Invitation</h4>
            </div>
            <div class="modal-body">  <form id="formSendInvitation">
          
    <table class="table">
        <tr>
            <td>Email </td>
            <td>:</td>
            <td>   
            <input type="text" name="invitationEmail" id="invitationEmail" class="form-control no-resize" required>
        </tr>
    </table>
    <div class="modal-footer">
    <button type="button" class="btn  btn-raised btn-success waves-effect"  onclick="$('#formSendInvitation').submit()">Invite !</button>
    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>

                </div>
</form>
</div>
    </div>
</div>
        </div>
    </div>
</div>



@endsection

@section("footer")

@endsection

@section("scripts")


<script>


      


        $("#formSendInvitation").on('submit', (e) => {
            e.preventDefault();
            var me = $(this);
            if ( me.data('requestRunning') ) {
            return;
            }
            $(this).data('requestRunning', true);
     
            if (confirm('Do you want to invite this email ?')) 
            $.ajax({
                type: 'POST',
                url: '/admin/backend/sendInvitation',
                data: {
                    "invitationEmail": $('#invitationEmail').val(),
                },
                dataType: 'JSON',
                success: (data) => {
                    if (!data.success) 
                    return showAlert(data.message)
                  
                }
            })
        })    
</script>
@endsection

