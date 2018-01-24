@section('title','Dashboard | Student')
  @extends('layouts.template')
    @section('side-nav')
        <div class="student-nav">
            <ul class="tabs">
              <li class="tab" id="usertab" class="active">
                <div class="avatar">
                  <a href="#userprofile" class=" tooltipped " data-position="top" data-delay="50" data-tooltip="My Profile"><i class="material-icons">face</i>
                    <label>{{Auth::user()->username}}</label>
                  </a>
                </div>
              </li>
              <li class="tab">
                <a href="#dashboard" >
                  <i class="material-icons ">dashboard</i>
                  <label>Dashboard</label>
                </a>
              </li>
              <li class="tab">
                <a href="#evaluation">
                  <i class="material-icons">subject</i>
                  <label>Subjects</label>
                </a>
              </li>
              <li class="tab">
                <a href="#calendar">
                  <i class="material-icons">today</i>
                  <label>Calendar</label>
                </a>
              </li>
            </ul>
        </div>
    @endsection
    @section('content')
      <div class="user-info" >
          <div class="name">
              <label>{{Auth::user()->student->fname}} {{Auth::user()->student->lname}} </label>
          </div>
          <div class="time-out">
              <label>{{ date('m-d-Y h:i') }}</label>
              <ul id='dropdown1' class='dropdown-content' >
                <li><a href="" onclick="event.preventDefault(); document.getElementById('logoutform').submit()" >Sign Out</a></li>
              </ul>
              <form id="logoutform"  method="post" style="display:none;" action="log-out">
                {{ csrf_field() }}
              </form>
              <a href="#!" class="dropdown" data-activates="dropdown1"><i class="material-icons">arrow_drop_down</i></a>
          </div>
          <script type="text/javascript">
            $(document).ready(function(){
                $('.dropdown').dropdown({
                   inDuration: 300,
                   outDuration: 225,
                   hover: true, // Activate on hover
                   belowOrigin: false, // Displays dropdown below the button
                   alignment: 'right', // Displays dropdown with edge aligned to the left of button
                   stopPropagation: false, // Stops event propagation
                 }
                );
            });
          </script>
      </div>
      <div class="user-content app" >
          <div class="user-main-content tab-content" id="dashboard">
            <studentdashboardvue :user="{{Auth::user()}}"></studentdashboardvue>
          </div>
          <div class="user-main-content tab-content" id="evaluation">
            <evaluationvue :user="{{Auth::user()}}"></evaluationvue>
          </div>
          <div class="user-main-content tab-content" id="calendar">
            <calendarvue></calendarvue>
          </div>
          <div class="user-main-content tab-content" id="userprofile">
            <userprofilevue></userprofilevue>
          </div>
          <div class="user-right-nav">
            <div class="side-nav-container">
              <div class="calendar z-depth-1 ">
                <updatesandannouncementvue></updatesandannouncementvue>
              </div>
            </div>
            <div class="side-nav-container">
              <div class="upcoming-events z-depth-1">
                <h4>Upcoming events</h4>
              </div>
            </div>
            <div class="side-nav-container">
              <div class="todos z-depth-1 ">
                <h4>Todos</h4>
              </div>
            </div>
          </div>
      </div>
        <footer class="page-footer  blue darken-3" >
          <div class="container">
            <div class="row">
              <div class="col l5 s12 info">
                <h4 class="white-text">Mater Dei College</h4>
                <p class="grey-text text-lighten-4">Wisdom thru Scholarship | Charity thru Service | Prayer life thru living the Gospel.</p>
                <p class="grey-text text-lighten-4 strong">Only the best is good enough !</p>

              </div>
              <div class="col l4 offset-l2 s12 links">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Academics</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Evaluation</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">School Calendar</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">News</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
              MDC Student Portal © 2017 Copyright
            <a class="grey-text text-lighten-4 right animated jello" href="#!">Sign Out <i class="material-icons">transfer_within_a_station</i></a>
            </div>
          </div>
        </footer>

        @if (Session::has('message'))
          <script type="text/javascript">
            $(document).ready(function(){
                 Materialize.toast('Welcome', 3000, 'rounded');
            });
          </script>
        @endif
        @section('javascript')
          <script type="text/javascript">
              $(document).ready(function(){
                $('.modal').modal();
                $('select').material_select();
                $('ul.tabs').tabs();
                $('.tooltipped').tooltip({delay: 50});
                $('.counters').each(function() {
                     var $this = $(this),
                         countTo = $this.attr('data-count');
                     $({ countNum: $this.text()}).animate({
                       countNum: countTo
                     },
                     {
                       duration: 5000,
                       easing:'linear',
                       step: function() {
                         $this.text(Math.floor(this.countNum));
                       },
                       complete: function() {
                         $this.text(this.countNum);
                         //alert('finished');
                       }
                     });
                 });
              });
          </script>
        @endsection
    @endsection
