<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>Doc master</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/cristal/css/bootstrap.min.css">
    <link rel="stylesheet" href="/cristal/css/font-awesome.min.css">
    <link rel="stylesheet" href="/cristal/css/line-icons.css">
    <link rel="stylesheet" href="/cristal/css/owl.carousel.css">
    <link rel="stylesheet" href="/cristal/css/owl.theme.css">
    <link rel="stylesheet" href="/cristal/css/nivo-lightbox.css">
    <link rel="stylesheet" href="/cristal/css/magnific-popup.css">
    <link rel="stylesheet" href="/cristal/css/animate.css">
    <link rel="stylesheet" href="/cristal/css/menu_sideslide.css">
    <link rel="stylesheet" href="/cristal/css/main.css">
    <link rel="stylesheet" href="/cristal/css/responsive.css">
    <script src="/cristal/js/jquery-min.js"></script>
<script>
    $( document ).ready(function() {
        $("#myModal").on("show.bs.modal", function(e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-body").load(link.attr("href"));
        });
        });  
function datasend() {
    $.ajax({
      data: $('#billingdataform').serialize(),
      url: "{{ route('pay') }}",
      type: "POST",
      dataType: 'json',
      success: function (data) { // session has script kezeli!
      /*    $('#productForm').trigger("reset");
          $('#ajaxModel').modal('hide');
          table.draw();*/
          $('#alertdiv').html(data.flash_message);
          $('#modalbody').html(data.html);
         // alert('succes');
      },
      error: function (data) {
        alert('hiba');
         // $('#saveBtn').html('Save Changes');
       //  $('#modalbody').html('kkkkk');
      }
  });

};
     
</script>    

<!--
@if (Session::has('flash_message'))
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>

@endif
-->


</head>

<body>
    <div class="menu-wrap">
        <nav class="menu navbar">

            <div class="icon-list navbar-collapse">
                <ul class="navbar-nav">

                @foreach($data['categories'] as $cat)    
                    <li class="nav-item">
                        <a class="nav-link" href="/cat/{{ $cat->id }}">{{ $cat->name }}</a>
                    </li>
                 @endforeach   
                </ul>
            </div>
        </nav>
        <button class="close-button" id="close-button"><i class="lnr lnr-cross"></i></button>
    </div>
    <!-- Header Section Start -->

    <header id="video-area" data-stellar-background-ratio="0.5">
        <div id="block" data-vide-bg="cristal/video/video"></div>
        <div class="fixed-top">
            <div class="container">
                <div class="logo-menu">
             <!--       <a href="index.html" class="logo"><span class="lnr lnr-diamond"></span> Cégnév</a> -->


  
            <!-- Authentication Links -->
            @guest
                <a class="logo" href="{{ url('/login') }}">Belépés </a>
                <a class="logo" href="{{ url('/register') }}"> Regisztráció</a>
            @else
            
                        <a class="logo" href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Kilépés
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
             
            @endguest
     




                 <button  style="right:150px;" class="menu-button" id="open-button"><h2  style="font-size:x-large " >Dokumentumok</h2></button>
                </div>
            </div>
        </div>
<div class="overlay overlay-2"></div>

@yield('content')


    <!-- Footer Section Start -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="social-icons wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">
                        <ul>
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li class="dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                    <div class="site-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
                        <p>All copyrights reserved &copy; 2017 - Designed & Developed by <a rel="nofollow" href="https://uideck.com">UIdeck</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="lnr lnr-arrow-up"></i>
    </a>

    <div id="loader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <!-- Default bootstrap modal example -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           
          </div>
          <div id="modalbody" class="modal-body">
                <div id="alertdiv" class="alert alert-success">         
                        {{ Session::get('flash_message') }}
                    </div>
          </div>
    
        </div>
      </div>
    </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
  
   <script src="/cristal/js/tether.min.js"></script>
   <script src="/cristal/js/bootstrap.min.js"></script>
    <script src="/cristal/js/classie.js"></script>
    <script src="/cristal/js/mixitup.min.js"></script>
    <script src="/cristal/js/nivo-lightbox.js"></script>
    <script src="/cristal/js/owl.carousel.min.js"></script>
    <script src="/cristal/js/jquery.stellar.min.js"></script>
    <script src="/cristal/js/jquery.nav.js"></script>
    <script src="/cristal/js/smooth-scroll.js"></script>
    <script src="/cristal/js/smooth-on-scroll.js"></script>
    <script src="/cristal/js/wow.js"></script>
    <script src="/cristal/js/menu.js"></script>
    <script src="/cristal/js/jquery.vide.js"></script>
    <script src="/cristal/js/jquery.counterup.min.js"></script>
    <script src="/cristal/js/jquery.magnific-popup.min.js"></script>
    <script src="/cristal/js/waypoints.min.js"></script>
    <script src="/cristal/js/form-validator.min.js"></script>
    <script src="/cristal/js/contact-form-script.js"></script>
    <script src="/cristal/js/main.js"></script> 

</body>

</html