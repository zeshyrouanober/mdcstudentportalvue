@extends('layouts.app')

@section('title','MDC Portal | Verification')

@section('body')
<div id="bg">
   <div class="bg1">
     <div class="log-in-container ">
        <div class="content  z-depth-5">
            <div class="content-title blue darken-3">
                <div class="progress blue darken-3">
                    <div class="indeterminate"></div>
                </div>
                <div class="school">
                    <h1>MDC Student Portal</h1>
                </div>
                <div class="title">
                    <label>Verification to continue</label>
                </div>
            </div>
            <div class="content-content">
              <form class="col s12"  method="post" action="{{route('verify')}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="input-field col s12">
                    <input id="verification" type="text" name="verification" required >
                    <label for="verification" class="verificationLabel">Enter Verification Key</label>
                  </div>
                  {{-- <a href="#" class="forgot-password">Forgot Password ?</a> --}}
                </div>
                <button class="btn waves-effect waves-light blue darken-3 right" type="submit" id="next">Next
                  <i class="material-icons right">send</i>
                </button>
              </form>
            </div>
            <div class="name blue darken-3">
                <label>MDC,Tubigon,Bohol.</label>
            </div>
        </div>
      </div>
      <div class="input-form wow fadeInUp">
        <div class="input-field col s12">
          <input id="verificationKey" name="verification" type="text" required>
          <label for="verificationKey" class="verificationKeyLabel">Verification Key</label>
          <button class="btn waves-effect waves-light white darken-3 right blue-text pulse" type="submit" id="verificationKeyButton">Go
            <i class="material-icons right blue-text">send</i>
          </button>
        </div>
      </div>
   </div>
   @if (Session::has('message'))
     <script type="text/javascript">
       $(document).ready(function(){
          Materialize.toast('Verification Already Taken !', 3000, 'rounded orange lighten-1');
          $('.content').addClass('animated shake');
       });
     </script>
   @endif
   @if (Session::has('messagenotfound'))
     <script type="text/javascript">
       $(document).ready(function(){
          Materialize.toast('Verification Not Found !', 3000, 'rounded red lighten-1');
          $('.content').addClass('animated shake');
       });
     </script>
   @endif
</div>
<script type="text/javascript">
  $(document).ready(function(){

        $('#next').on('click',function(){
          if ($.trim($('#verificationKey').val()) == '') {
            $('.progress').css("visibility","hidden");
            $('.indeterminate').css("visibility","hidden");
          }else {
            $('.progress').css("visibility","visible");
            $('.indeterminate').css("visibility","visible");
          }
        });

      if ($(window).width() < 1024) {
        $('#verification').on('click',function(){
          $('.content').css("display","none");
          $('.bg1').css("background-color","#1565C0");
          $('.input-form').css("display","flex");
          $('#verificationKey').focus();
        });

        $('#verificationKeyButton').on('click',function(){
          var verification = $('#verificationKey').val();
          $('.input-form').css("display","none");
          $('.content').css("display","flex");
          $('.bg1').css("background-color","rgba(0, 0, 0, 0.529)");
          $('#verification').val(verification);
          $('.verificationLabel').addClass("active");
        });
      }

  });
</script>
@endsection
