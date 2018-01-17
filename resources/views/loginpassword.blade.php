@extends('layouts.app')

@section('title','MDC Portal | Sign Up')

@section('body')
<div id="bg">
   <div class="bg1">
     <div class="log-in-container ">
        <div class="content  z-depth-5">
            <div class="content-title">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                <div class="school">
                    <h1>MDC Student Portal</h1>
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
                <div class="row">
                  <div class="input-field col s12">
                    <input id="passwordSignIn" type="password" required name="passwordSignIn" >
                    <label for="passord">Password</label>
                  </div>
                  {{-- <a href="#" class="forgot-password">Forgot Password ?</a> --}}
                </div>
                <button class="btn waves-effect waves-light right" type="submit" id="next">Log In
                  <i class="material-icons right">send</i>
                </button>
              </form>
            </div>
            <div class="name">
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
