@section('title','Dashboard | Admin')
  @extends('layouts.template')
    @section('side-nav')
        <div class="student-nav">
            <ul class="tabs">
              <li class="tab" id="usertab">
                <div class="avatar">
                  <a href="#adminprofile" class=" tooltipped " data-position="top" data-delay="50" data-tooltip="My Profile"><img src="/storage/avatars/school-logo2.png" alt="">
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
                <a href="#accounts">
                  <i class="material-icons">account_circle</i>
                  <label>Accounts</label>
                </a>
              </li>
              <li class="tab" >
                <a href="#subjects">
                  <i class="material-icons" >subject</i>
                  <label>Subjects</label>
                </a>
              </li>
              <li class="tab">
                <a href="#students" >
                  <i class="material-icons">people</i>
                  <label>Students</label>
                </a>
              </li>
              {{-- <li class="tab">
                <a href="#grades">
                  <i class="material-icons">assignment</i>
                  <label>Grades</label>
                </a>
              </li> --}}
              <li class="tab">
                <a href="#news">
                  <i class="material-icons">theaters</i>
                  <label>Announcement</label>
                </a>
              </li>
              <li class="tab" >
                <a href="#verifications" id="veriftab">
                  <i class="material-icons">verified_user</i>
                  <label>Verification</label>
                </a>
              </li>
            </ul>
        </div>
    @endsection
    @section('content')
      <div class="user-info ">
        {{-- @foreach ($student as $stud) --}}
          <div class="name">
              <label>Justice League</label>
          </div>
        {{-- @endforeach --}}
          <div class="time-out">
              {{-- <label>{{ date('m-d-Y h:i') }}</label> --}}
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
      <span class="app">
      <div class="user-content">
          <div class="user-main-content tab-content" id="dashboard">
            <admindashboardvue></admindashboardvue>
          </div>
          <div class="user-main-content tab-content" id="subjects">
            <subjectvue></subjectvue>
          </div>
          <div class="user-main-content tab-content" id="students">
            <studentvue></studentvue>
          </div>
          <div class="user-main-content tab-content" id="adminprofile">
            <adminprofilevue></adminprofilevue>
          </div>
          <div class="user-main-content tab-content" id="news" >
            <announcementvue></announcementvue>
          </div>
          <div class="user-main-content tab-content" id="accounts">
            <accountvue></accountvue>
          </div>
          <div class="user-main-content tab-content" id="verifications">
            <verificationvue></verificationvue>
         </div>
          <div class="user-right-nav">
              <div class="side-nav-container">
                <div class="calendar z-depth-1">
                  <activeuservue></activeuservue>
                </div>
              </div>
              <div class="side-nav-container">
                <div class="upcoming-events z-depth-1">
                  <recentactiveuservue></recentactiveuservue>
                </div>
              </div>
          </div>
      </div>
      </span>
      @if (Session::has('message'))
        <script type="text/javascript">
          $(document).ready(function(){
               Materialize.toast('Welcome', 3000, 'rounded light-blue');
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
                   $({ countNum: $this.val()}).animate({
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
                     }
                   });
               });

              $('.datepicker').pickadate({
                selectMonths: true,
                selectYears: 15,
                today: 'Today',
                clear: 'Clear',
                close: 'Ok',
                closeOnSelect: false,
                format: 'yyyy-mm-dd'
              });

            });
        </script>
      @endsection
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
          <a class="grey-text text-lighten-4 right animated jello" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit()">Sign Out <i class="material-icons">transfer_within_a_station</i></a>
          <form id="logoutform"  method="post" style="display:none;" action="log-out">
            {{ csrf_field() }}
          </form>
        </div>
        </div>
      </footer>
    @endsection
    @section('footer')

    @endsection
