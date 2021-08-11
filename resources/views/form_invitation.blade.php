<!doctype html>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400|Roboto+Mono&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/pub/user/fonts/icomoon/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/pub/user/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="/pub/user/css/style.css">

    <title>HuntBazaar | HuntStreet </title>
    <style>
      .hidden{
        display:none;
      }

      </style>
  </head>
  <body>

  <div class="content">
    
    <div class="container">

    <div class="row justify-content-center">
        <div  class="col-md-8" >
          <div class="row mb-5">
            <img style="width:100%" src="/pub/user/images/huntstreet-logo.png">
           </div>
          </div>
        </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="row mb-5">
            <div class="col-md-12 mr-auto">
              <h3 class="thin-heading mb-4">About BazaarHunt</h3>
              <p>BazaarHunt is biggest annual event from HuntStreet, where we launch various of special deals for our services
                and special discount for featured items!</p>
            <div style="text-align: center;"><h1  id="demo"></h1></div>
                
            </div>
            <div class="col-md-6 ml-auto">
             
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-md-12">
              <h3 class="thin-heading mb-4">Register Now !</h3>
  

              <form class="mb-5" id="formCustomerResponse" name="formCustomerResponse">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" class="form-control" name="customerResponseName" id="customerResponseName" placeholder="Your name">
                  </div>
                  <div class="col-md-6 form-group">
                  <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
                   <input type="hidden" id="invitationID" name="invitationID"  value="{{$inv->invitationID}}">
                    <input type="text" class="form-control" disabled value="{{$inv->invitationEmail}}" name="email" id="email" placeholder="Email">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                  Date of Birth
                  <input type="date" class="form-control" name="customerResponseDOB" id="customerResponseDOB" placeholder="Date of Birth">
                  </div>
                </div>  

                <div class="row">
                  <div class="col-md-12 form-group">
                    <select name="customerResponseGender" id="customerResponseGender" class="form-control" required>
                    <option disabled selected value>Select Your Gender</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                  </select>
                  </div>
                </div>  

                <div class="row">
                  <div class="col-md-12 form-group">
                    <input  class="form-control" placeholder="Search Your Favorit Brand" id="searchbox">
                    <div id="designers" class="hidden">

                    </div>
                  </div>
                </div>  

            
                <div class="row">
                  <div class="col-12">
                  <button type="submit"class="btn btn-primary rounded-0 py-2 px-4" id="formCustomerResponse">Register</button>

                  <span class="submitting"></span>
                  </div>
                </div>
              </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  @section("footer")


  <footer>
    <div class="row justify-content-center">
        Copyright 2021 - Huntstreet
  </footer>
    
  @endsection



  @section("scripts")

    <script src="/pub/user/js/jquery-3.3.1.min.js"></script>
    <script src="/pub/user/js/popper.min.js"></script>
    <script src="/pub/user/js/bootstrap.min.js"></script>
    <script src="/pub/user/js/jquery.validate.min.js"></script>
    <script src="/pub/user/js/main.js"></script>
    <script src="/pub/user/js/list_designer.js"></script>

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
</script>

  <script>
// Set the date we're counting down to
var countDownDate = new Date("Sept 11, 2021 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
    
</script>

<script>

let designerEl = $('#designers')
for (let designer of designers) {
    designerEl.append(`
    <div class="checking">
        <input type="checkbox" id="${designer}" value="${designer}">${designer}
    </div>
    `) 
}

let inputEl = $('#searchbox')
inputEl.keyup(onInputChange)

function onInputChange(e) {
 
     if (inputEl.val() != '') {
        designerEl.removeClass('hidden')
        console.log(designerEl.find('.checking'))

        designerEl.find('.checking').each(function() {
          
            let designerName = $(this).find('input').val()
            if (!designerName.toLowerCase().includes(inputEl.val().toLowerCase())) {
                $(this).addClass('hidden') 
                
            } else {
              $(this).removeClass('hidden')
            }
        })
    } else {
        designerEl.addClass('hidden') 
    }
}

$("#formCustomerResponse").on('submit', (e) => {
           e.preventDefault();
           var me = $(this);
           if ( me.data('requestRunning') ) {
           return;
           }
           $(this).data('requestRunning', true);

           let customerResponseName = $("#customerResponseName").val()
           let customerResponseDOB = $("#customerResponseDOB").val()
           let customerResponseGender = $("#customerResponseGender").val()
           let invitationID = $("#invitationID").val()
           customerResponseFav=[]
           
           designerEl.find('input[type=checkbox]').each(function() {
              if ($(this).is(':checked')) {
                
                customerResponseFav.push(this.value)
              }
            })
          //  for(var i=0; i < designers.length; i++){
          //   if($('#'+designers[i]).is(':checked')){
           // customerResponseFav.push(designers[i])
          //   }
          //  }
           customerResponseFav=customerResponseFav.join(',')

           console.log("array nya : " + customerResponseFav);

           $.ajax({
               type: 'POST',
               url: '/user/save/response',
               data: 
               {
                 "customerResponseName" : $("#customerResponseName").val(),
                 "customerResponseDOB" : $("#customerResponseDOB").val(),
                 "customerResponseGender" : $("#customerResponseGender").val(),
                 "invitationID" : $("#invitationID").val(),
                 "csrf_token" : $("#csrf_token").val(),
                 "customerResponseFav" : customerResponseFav
                
                },

               dataType: 'JSON',
               success: (data) => {
                   if (!data.success) return showAlert(data.message)
                   else alert("Data anda berhasil disimpan!")
                  //  location.href = '/admin'
               }
           })
       })


</script>
   

    </body>

</html>