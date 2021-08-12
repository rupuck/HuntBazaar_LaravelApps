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
                    <h4>List Customer Responses</h4>

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
                                    <th>Invitation ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer DOB</th>
                                    <th>Customer Gender</th>
                                    <th>Customer Registration Code</th>
                                    <th>Customer Favorite Brands</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                            @foreach($res as $r)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$r->invitationID}}</td>
                        <td>{{$r->customerResponseName}}</td>
                        <td>{{$r->customerResponseDOB}}</td>
                        <td>{{$r->customerResponseGender}}</td>
                        <td>{{$r->customerRegistrationCode}}</td>
                        <td>{{$r->customerResponseFav}}</td>
                        <td>{{$r->created_at}}</td>
                    </tr>

                                @endforeach
                           
                            </tbody>
                        </table>

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
                    if (!data.success) return showAlert(data.message)
                     location.reload()
                }
            })
        })    
</script>
@endsection

