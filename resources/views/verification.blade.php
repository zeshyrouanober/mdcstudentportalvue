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
                    <label for="verification">Enter Verification Code</label>
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
   </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
      $('#next').on('click',function(){
        if($.trim($('#verification').val()) != ''){
          $('.progress').css("display","flex");
          $('.indeterminate').css("display","flex");
       }
      });
  });
</script>
@endsection
