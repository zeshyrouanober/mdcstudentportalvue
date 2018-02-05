@section('title','Dashboard | Student')
  @extends('layouts.template')
    @section('side-nav')
        <div class="student-nav">
            <ul class="tabs wow flash">
              <li class="tab" id="usertab" >
                <div class="avatar">
                  <a href="#userprofile" class=" tooltipped " data-position="top" data-delay="50" data-tooltip="My Profile"><img src="/storage/avatars/{{Auth::user()->avatar}}" alt="">
                    <label>{{Auth::user()->username}}</label>
                  </a>
                </div>
              </li>
              <li class="tab">
                <a href="#dashboard"  >
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
              <li class="tab">
                <a href="#faqs" class="active">
                  <i class="material-icons">info_outline</i>
                  <label>faqs</label>
                </a>
              </li>
              <li class="tab">
                <a href="#help">
                  <i class="material-icons">help_outline</i>
                  <label>Help</label>
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
            <label id="time"></label>
            <script type="text/javascript">
              var timestamp = '<?=time('d m y');?>';
                function updateTime(){
                  $('#time').html(Date(timestamp));
                  timestamp++;
                }
              $(function(){
                setInterval(updateTime, 1000);
              });
            </script>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit()"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Logout">exit_to_app</i></a>
            <form id="logoutform"  method="post" style="display:none;" action="log-out">
              {{ csrf_field() }}
            </form>
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
            <userprofilevue :user="{{Auth::user()}}"></userprofilevue>
          </div>
          <div class="user-main-content tab-content" id="faqs">
            <faqsvue></faqsvue>
          </div>
          <div class="user-main-content tab-content" id="help">
            <helpvue></helpvue>
          </div>
          <div class="user-right-nav white">
            <div class="side-nav-container">
              <div class="calendar z-depth-2 ">
                <updatesandannouncementvue></updatesandannouncementvue>
              </div>
            </div>
            <div class="side-nav-container">
              <div class="upcoming-events z-depth-2">
                <upcomingeventsvue></upcomingeventsvue>
              </div>
            </div>
            <div class="side-nav-container">
              <div class="todos z-depth-2 ">
                <todosvue></todosvue>
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
                  <li><a class="grey-text text-lighten-3" href="#!">mdc.com.ph</a></li>

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
                 Materialize.toast('Welcome', 3000, 'rounded light-blue lighten-1');
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
                $('.collapsible').collapsible();
                 $('.scrollspy').scrollSpy();
                // $('.counters').each(function() {
                //      var $this = $(this),
                //          countTo = $this.attr('data-count');
                //      $({ countNum: $this.text()}).animate({
                //        countNum: countTo
                //      },
                //      {
                //        duration: 5000,
                //        easing:'linear',
                //        step: function() {
                //          $this.text(Math.floor(this.countNum));
                //        },
                //        complete: function() {
                //          $this.text(this.countNum);
                //          //alert('finished');
                //        }
                //      });
                //  });
              });
          </script>
        @endsection
    @endsection
