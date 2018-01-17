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
                    <label>Sign Up</label>
                </div>
            </div>
            <div class="content-content">
              <form class="col s12"  method="get" action="{{route('signup')}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="input-field col s12">
                    <input id="idnumber" type="text" name="idnumber" required>
                    <label for="idnumber">ID Number</label>
                  </div>
                  {{-- <a href="#" class="forgot-password">Forgot Password ?</a> --}}
                </div>
                <button class="btn waves-effect waves-light right" type="submit" id="next">Next
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
        if($.trim($('#idnumber').val()) != ''){
          $('.progress').css("display","flex");
          $('.indeterminate').css("display","flex");
       }
      });
  });
</script>
@endsection
