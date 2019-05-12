<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Landmark 98</title>
        <link href="{{ asset('css/VH.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/Hau.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/landmark.css') }}" type="text/css"/>
        <script src="{{ asset('js/VH.js') }}" type="text/javascript"></script>
        <script src="{{asset('js/jquery.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/landmark.js') }}" type="text/javascript"></script>
        <link href="{{ asset('logo.ico') }}" rel="shortcut icon">
    </head>
    <body id="main"> 
    <!-- Header -->
    <div class="vh-container vh-bar vh-top vh-safety-blue vh-faster" id="navbar" style="z-index:4">
        <div class="vh-bar-item"><a href="{{ asset('') }}"><img src="{{ asset('logo.ico') }}" width="40px"></a></div>
        <div class="vh-bar-item vh-right" style="margin:8px 16px;" onclick="hideShowBarBlock();"><span class="glyphicon glyphicon-triangle-bottom"></span></div>
        <label class="vh-switch-round vh-right" style="margin:8px 16px;">
            <input type="checkbox">
            <span class="vh-switch-slider" onclick="checknightmode();"></span>
        </label>
    </div>
    <div id="dropdown" class="vh-bar-block vh-card vh-safety-blue vh-hide" style="position:fixed;z-index:1;right:0px">
      <a href="{{ url('Customer',[session('account')->username]) }}" class="vh-bar-item vh-button">{{session('account')->customer->name}}</a>
      <a href="#" class="vh-bar-item vh-button">Link 2</a>
      <a href="{{url('logout')}}" class="vh-bar-item vh-button">Đăng xuất</a>
    </div>
    <!-- Container -->
    <div class="vh-row-padding vh-margin-bottom" style="margin: 70px 0px">
    @yield('Container')
    </div>
    <!-- Modal -->
    <div id="modal-info" class="vh-overlay" style="z-index:6" onclick="closeSidebar('modal-info');">
      <div class="vh-display-topright" onclick="closeSidebar('modal-info');"><span class="fa fa-remove vh-text-white vh-padding vh-xlarge"></span></div>
      <div class="landmark-content vh-animate-zoom" onclick="event.stopImmediatePropagation();">
        <div class="vh-row">
          <div class="vh-col l8 landmark-image vh-display-container">
            <!-- Image -->
            <img class="vh-display-middle" id="modal-image" />
          </div>
          <div class="vh-col l4 vh-white vh-right landmark-info vh-padding">
            <div class="landmark-scroll">
              <!-- User post -->
              <div class="vh-row">
                <div class="vh-col l2 m2 s2"><img id="modal-avatar" class="vh-circle" src="{{ asset('upload\defaultCus.jpg') }}" width="40px"> </div>
                <div class="vh-col l10 m10 s10">
                  <a id="modal-user" href="#"></a>
                  <div id="modal-created" class="vh-small vh-text-gray"></div>
                </div>
              </div>
              <!-- Caption -->
              <div class="vh-margin-top" id="modal-caption"></div>
              <hr/>
              <!-- Comments -->
              <div id="modal-comments"></div>
            </div>
            <!-- User Comment -->
            <div class="vh-margin-small">
              <div class="vh-col l2 m1 s2">
                <img class="vh-circle" src="{{asset(Session::get('account')->customer->image)}}" width="40px">
              </div>
              <div class="vh-col l10 m11 s10">
                <textarea id="txt_modal" class="vh-border-0" placeholder="Bạn hãy nhập bình luận..." style="width:100%" rows=2></textarea>
              </div>          
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      var prevScrollpos = window.pageYOffset;
      window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
          document.getElementById("navbar").style.top = "0";
        } else {
          document.getElementById("navbar").style.top = "-68px";
          if(document.getElementById('dropdown').className.indexOf('vh-hide') == -1) {
            hideShowBarBlock();
          }
        }
        var ad_left = document.getElementById("ad-left");
        var ad_right = document.getElementById("ad-right");
        if(currentScrollPos + $(window).height() >= 70 + ad_left.offsetHeight){
          ad_left.style.top = (currentScrollPos - 100 - (ad_left.offsetHeight - $(window).height()) + "px");
        } else {
            ad_left.style.top = "0px";
        }
        if(currentScrollPos + $(window).height() >= 70 + ad_right.offsetHeight){
          ad_right.style.top = (currentScrollPos - 100 - (ad_right.offsetHeight - $(window).height()) + "px");
        } else {
          ad_right.style.top = "0px"
        }
        prevScrollpos = currentScrollPos;
      }
    </script>
    </body>
</html>
