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
                    <label for="passord">Password</label>
                  </div>
                  <div class="input-field col s12">
                    <input id="passwordconfirmation" type="password" required name="password_confirmation">
                    <label for="passordconfirmation">Confirm Password</label>
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
   </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
      $('#next').on('click',function(){
          if(($.trim($('#password').val()) != '') && ($.trim($('#passwordconfirmation').val()) != '') ){
            $('.progress').css("display","flex");
            $('.indeterminate').css("display","flex");
         }
      });
  });
</script>
@endsection
