@extends('layouts.app')

@section('title','MDC | Portal')

@section('body')
      <div class="template-container" >
        <div class="template-header">
            <div class="logo">
                <img src="images/school-logo2.png" alt="" class="animated rollIn">
            </div>
            <div class="system-info">
                <h1 class="animated rubberBand">Mater Dei College Student Portal</h1>
            </div>
        </div>
        <div class="template-content">
            <div class="template-content-nav-bar">
                @section('side-nav')
                  @show
            </div>
            <div class="template-content-content grey lighten-4">
                @section('content')
                  @show
            </div>
        </div>
        <div class="template-footer">
                @section('footer')
                  @show
        </div>
    </div>
    <script type="text/javascript" src="js/app.js"></script>
@endsection
