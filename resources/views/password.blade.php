@extends('layouts.app')

@section('title','MDC Portal | Sign Up')

@section('body')
<div id="bg">
   <div class="bg1">
     <div class="log-in-container ">
        <div class="content  z-depth-5">
            <div class="content-title blue darken-3">
                @foreach ($student as $stud)
                <div class="progress blue darken-3">
                    <div class="indeterminate"></div>
                </div>
                <div class="school">
                    <h1>MDC Student Portal</h1>
                </div>
                <div class="title">
                    <label class="stud_info">{{$stud->lname}}, {{$stud->fname}}  </label>
                    <label class="stud_id">{{$stud->idnum}}</label>
                </div>
                @endforeach
            </div>
            <div class="content-content">
              <form class="col s12"  method="post" action="sign-up-user">
                {{ csrf_field() }}
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" type="password" required name="password" >
                    <label for="passord" class="passwordLabel">Password</label>
                  </div>
                  <div class="input-field col s12">
                    <input id="passwordconfirmation" type="password" required name="password_confirmation">
                    <label for="passordconfirmation" class="passwordConfirmationLabel">Confirm Password</label>
                  </div>
                  {{-- <a href="#" class="forgot-password">Forgot Password ?</a> --}}
                </div>
                <button class="btn waves-effect waves-light right" type="submit" id="next">Finish
                  <i class="material-icons right">send</i>
                </button>
              </form>
            </div>
            <div class="name blue darken-3">
                <label>MDC,Tubigon,Bohol.</label>
            </div>
        </div>
      </div>

      <div class="input-form wow fadeInUp" id="passwordForm">
        <div class="input-field col s12">
          <input id="passwordInput" type="password" required>
          <label for="passwordInput" class="passwordlabel">Password </label>
          <button class="btn waves-effect waves-light white darken-3 right blue-text pulse" type="submit" id="passwordButton">Go
            <i class="material-icons right blue-text">send</i>
          </button>
        </div>
    </div>

    <div class="input-form wow fadeInUp" id="passwordConfirmForm">
      <div class="input-field col s12">
        <input id="passwordConfirm" type="password" required>
        <label for="passwordConfirm" class="passwordConfirmLabel">Confirm Password</label>
        <button class="btn waves-effect waves-light white darken-3 right blue-text pulse" type="submit" id="passwordconfirmButton">Go
          <i class="material-icons right blue-text">send</i>
        </button>
      </div>
    </div>
    @if (Session::has('passworddontmatch'))
      <script type="text/javascript">
        $(document).ready(function(){
           Materialize.toast('Password dont match !', 3000, 'rounded orange lighten-1');
           $('.content').addClass('animated shake');
        });
      </script>
    @endif
   </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
      $('#next').on('click',function(){
          if(($.trim($('#password').val()) != '') && ($.trim($('#passwordconfirmation').val()) != '') ){
            $('.progress').css("visibility","visible");
            $('.indeterminate').css("visibility","visible");
         }
      });


      if ($(window).width() < 1024) {

        $('.log-in-container').css("display","block");

        $('#password').on('click',function(){
          $('.content').css("display","none");
          $('.bg1').css("background-color","#1565C0");
          $('#passwordForm').css("display","flex");
          $('#passwordInput').focus();
        });

        $('#passwordButton').on('click',function(){
          var password = $('#passwordInput').val();
          $('#passwordForm').css("display","none");
          $('.content').css("display","flex");
          $('.bg1').css("background-color","rgba(0, 0, 0, 0.529)");
          $('#password').val(password);
          $('.passwordLabel').addClass("active");
        });

        $('#passwordconfirmation').on('click',function(){
          $('.content').css("display","none");
          $('.bg1').css("background-color","#1565C0");
          $('#passwordConfirmForm').css("display","flex");
          $('#passwordConfirm').focus();
        });

        $('#passwordconfirmButton').on('click',function(){
          var passwordConfirm = $('#passwordConfirm').val();
          $('#passwordConfirmForm').css("display","none");
          $('.content').css("display","flex");
          $('.bg1').css("background-color","rgba(0, 0, 0, 0.529)");
          $('#passwordconfirmation').val(passwordConfirm);
          $('.passwordConfirmationLabel').addClass("active");
        });
      }
  });
</script>
@endsection
