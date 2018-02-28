@extends('layouts.app')

@section('title','MDC Portal | Sign Up')

@section('body')
<div id="bg">
   <div class="bg1">
     <div class="log-in-container ">
        <div class="content  z-depth-5">
            <div class="content-title blue darken-3">
                <div class="progress blue darken-3">
                    <div class="indeterminate"></div>
                </div>
                <div class="school ">
                    <h1>MDC Student Portal</h1>
                    <div class="avatar-container">
                        @foreach ($user as $u )
                            <img id="student-avatar" src="/storage/avatars/{{$u->avatar}}" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="title">
                    @foreach ($student as $stud)
                      <label class="stud_info">{{$stud->lname}}, {{$stud->fname}} </label>
                    @endforeach
                    @foreach ($user as $u)
                      <label class="stud_id">{{$u->username}}</label>
                    @endforeach
                </div>
            </div>
            <div class="content-content">
              <form class="col s12"  method="post" action="{{route('passwordSignIn')}}">
                {{ csrf_field() }}
                <div class="tips">
                    <i id="info" class="material-icons orange-text">info_outline</i>
                    <div id="info-label">
                        <label >Your personal pin</label>    
                    </div>    
                </div>                
                <br>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="passwordSignIn" type="password" required name="passwordSignIn" >
                    <label for="passord" class="passwordlabel">Password</label>
                  </div>
                  {{-- <a href="#" class="forgot-password">Forgot Password ?</a> --}}
                </div>
                <button class="btn waves-effect waves-light right" type="submit" id="next">Log In
                  <i class="material-icons right">send</i>
                </button>
              </form>
            </div>
            <div class="name blue darken-3">
                <label>MDC,Tubigon,Bohol.</label>
            </div>
        </div>
        <div class="input-form wow fadeInUp">
          <div class="input-field col s12">
            <input id="passwordInput" name="password" type="password" required>
            <label for="passwordInput" class="passwordlabel">Password </label>
            <button class="btn waves-effect waves-light white darken-3 right blue-text pulse" type="submit" id="passwordButton">Go
              <i class="material-icons right blue-text">send</i>
            </button>
          </div>
      </div>
      </div>
   </div>
   @if (Session::has('message'))
     <script type="text/javascript">
       $(document).ready(function(){
          Materialize.toast('Wrong Password !', 3000, 'rounded red lighten-1');
          $('.content').addClass('animated shake');
       });
     </script>
   @endif
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#next').on('click',function(){
      if ($.trim($('#passwordSignIn').val()) == '') {
        $('.progress').css("visibility","hidden");
        $('.indeterminate').css("visibility","hidden");
      }else {
        $('.progress').css("visibility","visible");
        $('.indeterminate').css("visibility","visible");
      }
    });

      if ($('.student_info').text() != null) {
        $('#admin-avatar').css("display","none");
      }else{
        $('#admin-avatar').css("display","flex");
      }

      if ($(window).width() < 1024) {
        $('#passwordSignIn').on('click',function(){
          $('.content').css("display","none");
          $('.bg1').css("background-color","#1565C0");
          $('.input-form').css("display","flex");
          $('#passwordInput').focus();
        });

        $('#passwordButton').on('click',function(){
          var password = $('#passwordInput').val();
          $('.input-form').css("display","none");
          $('.content').css("display","flex");
          $('.bg1').css("background-color","rgba(0, 0, 0, 0.529)");
          $('#passwordSignIn').val(password);
          $('.passwordlabel').addClass("active");
        });
      }

      $('#info').on('click',function(){
        $('#info-label').css("visibility","visible").addClass('animated swing');
      });
  });
</script>
@endsection
