<!DOCTYPE html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Index - HRD</title>
    <!-- Favicon-->
    <link rel="icon" href="/pub/admin/favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    
    
    <link rel="stylesheet" href="/pub/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/pub/admin/css/main.css">
    <link rel="stylesheet" href="/pub/admin/css/authentication.css">
    <link rel="stylesheet" href="/pub/admin/css/color_skins.css">
</head>

<body class="theme-orange">
<div class="authentication">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo"><img src="/pub/admin/images/logo.png" alt="Nexa"></div>
                        <h1>Bazaar Hunt</h1>
                       
                    </div>                        
                </div>
                <form class="col-lg-12"  id="formLogin">
                    <br><h5 class="title">Admin Login</h5>
                    <br>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" id="username">
                            <label class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password">
                            <label class="form-label">Password</label>
                        </div>
                    </div>
                                 
                </form>
                <div class="col-lg-12">
                    <button class="btn btn-raised btn-primary waves-effect" type="button" onclick="$('#formLogin').submit()">LOG IN</a>
                                        </button>
                </div>
                                 
            </div>
        </div>
    </div>
</div>


<input type="hidden" id="nextURL" value="{{ $next }}">

@yield("footer")

<input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
<!-- Jquery Core Js -->
<script src="/pub/admin/bundles/libscripts.bundle.js"></script>    
<script src="/pub/admin/bundles/vendorscripts.bundle.js"></script>
<script src="/pub/admin/bundles/mainscripts.bundle.js"></script>


<script>
    function includeCSRF() {
        var send = XMLHttpRequest.prototype.send,
            token = $('#csrf_token').val();
        XMLHttpRequest.prototype.send = function(data) {
            this.setRequestHeader('X-CSRF-Token', token);
            return send.apply(this, arguments);
        };
    }

    includeCSRF()

    $("#formLogin").on('submit', (e) => {
        e.preventDefault()

        let username = $("#username").val()
        let password = $("#password").val()

        $.ajax({
            type: 'POST',
            url: '/admin/backend/auth/login',
            data: {'username': username, 'password': password},
            success: (data) => {
                if (!data.success) return alert(data.message)

                if ($("#nextURL").val())
                    location.href = $("#nextURL").val()
                else
                    location.href = '/admin'
            }
        })
    })
</script>

@yield('scripts')
</body>
</html>
