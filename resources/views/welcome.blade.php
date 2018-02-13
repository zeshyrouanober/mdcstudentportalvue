@extends('layouts.app')

@section('title','MDC Portal | Log-In')

@section('body')
<div id="bg">
   <div class="bg1">
   <div class="log-in-container">
        <div class="content z-depth-5">
            <div class="content-title blue darken-3">
                <div class="progress blue darken-3">
                    <div class="indeterminate"></div>
                </div>
                <div class="school">
                    <h1>MDC Student Portal</h1>
                </div>
                <div class="title">
                    <label>Sign In to your account</label>
                     <a href="verification-index" id="add" class="btn btn-floating btn-large waves-effect waves-light white pulse" ><i class="material-icons">edit</i></a>
                </div>
            </div>
            <div class="content-content">
              <form class="col s12" method="get" action="{{route('signin')}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="input-field col s12">
                    <input id="idnumber" name="idnumber" type="text" required>
                    <label for="idnumber" class="idnumberlabel">ID Number</label>
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
        <div class="input-form wow fadeInUp">
          <div class="input-field col s12">
            <input id="idnumberInput" name="idnumber" type="text" required>
            <label for="idnumberInput" class="idnumberlabel">ID Number</label>
            <button class="btn waves-effect waves-light white darken-3 right blue-text pulse" type="submit" id="idnumberButton">Go
              <i class="material-icons right blue-text">send</i>
            </button>
          </div>
      </div>
   </div>
</div>
<script>
    $(document).ready(function(){

        $('#add').on('click',function(){
            $('.progress').css("display","flex");
            $('.indeterminate').css("display","flex");
        });

        $('#next').on('click',function(){
            $('.progress').css("display","flex");
            $('.indeterminate').css("display","flex");
        });



        $('#idnumber').on('click',function(){
          $('.content').css("display","none");
          $('.bg1').css("background-color","#1565C0");
          $('.input-form').css("display","flex");
          $('#idnumberInput').focus();
        });

        $('#idnumberButton').on('click',function(){
          var idnumber = $('#idnumberInput').val();
          $('.input-form').css("display","none");
          $('.content').css("display","flex");
          $('.bg1').css("background-color","rgba(0, 0, 0, 0.529)");
          $('#idnumber').val(idnumber);
          $('.idnumberlabel').addClass("active");

        });
    });

</script>
@endsection
