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
                <div class="school">
                    <h1>MDC Student Portal</h1>
                </div>
                <div class="title">
                    <label>Sign Up</label>
                </div>
            </div>
            <div class="content-content">
              <form class="col s12"  method="get" action="{{route('signup')}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="input-field col s12">
                    <input id="idnumber" type="text" name="idnumber" required>
                    <label for="idnumber" class="idnumberLabel">ID Number</label>
                  </div>
                  {{-- <a href="#" class="forgot-password">Forgot Password ?</a> --}}
                </div>
                <button class="btn waves-effect waves-light right" type="submit" id="next">Next
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
          <input id="studentID" name="studentID" type="text" required>
          <label for="studentID" class="studentIDLabel">ID Number</label>
          <button class="btn waves-effect waves-light white darken-3 right blue-text pulse" type="submit" id="studentIDButton">Go
            <i class="material-icons right blue-text">send</i>
          </button>
        </div>
      </div>
   </div>
</div>
@if (Session::has('idnumbernotfound'))
  <script type="text/javascript">
    $(document).ready(function(){
       Materialize.toast('Id Number Not Found !', 3000, 'rounded red lighten-1');
       $('.content').addClass('animated shake');
    });
  </script>
@endif
<script type="text/javascript">
  $(document).ready(function(){

      $('#next').on('click',function(){
        if ($.trim($('#idnumber').val()) == '') {
          $('.progress').css("visibility","hidden");
          $('.indeterminate').css("visibility","hidden");
        }else {
          $('.progress').css("visibility","visible");
          $('.indeterminate').css("visibility","visible");
        }
      });

      if ($(window).width() < 1024) {
        $('#idnumber').on('click',function(){
          $('.content').css("display","none");
          $('.bg1').css("background-color","#1565C0");
          $('.input-form').css("display","flex");
          $('#studentID').focus();
        });

        $('#studentIDButton').on('click',function(){
          var studentID = $('#studentID').val();
          $('.input-form').css("display","none");
          $('.content').css("display","flex");
          $('.bg1').css("background-color","rgba(0, 0, 0, 0.529)");
          $('#idnumber').val(studentID);
          $('.idnumberLabel').addClass("active");
        });
      }
  });
</script>
@endsection
