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
          // if(($.trim($('#password').val()) != '') && ($.trim($('#passwordconfirmation').val()) != '') ){
            $('.progress').css("display","flex");
            $('.indeterminate').css("display","flex");
         // }
      });

      if ($('.student_info').text() != null) {
        $('#admin-avatar').css("display","none");
      }else{
        $('#admin-avatar').css("display","flex");
      }
  });
</script>
@endsection
