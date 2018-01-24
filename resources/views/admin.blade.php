@section('title','Dashboard | Admin')
  @extends('layouts.template')
    @section('side-nav')
        <div class="student-nav">
          <div class="avatar">
              <a href="#profile" class="modal-trigger tooltipped " data-position="top" data-delay="50" data-tooltip="My Profile"><i class="material-icons">face</i></a>
              <label>Admin</label>
          </div>
          <div id="profile" class="modal modal-fixed-footer">
            <div class="modal-content">
              <div class="modal-header light-blue darken-1">
                <h5>My Profile</h5>
              </div>
              <div class="profile-content">
                <div class="profile-picture">

                </div>
                <div class="modal-fields" >
                  <div class="input-field" >
                    <input id="student-idnum"  name="student-idnum"type="text" class="validate" >
                    <label for="student-idnum" >Username</label>
                  </div>
                  <div class="input-field" id="acccount-label-active" >
                    <input id="password"  name="password" type="text" class="validate">
                    <label for="password" >New Password</label>
                  </div>
                  <div class="input-field" id="acccount-label-active" >
                    <input id="passwordconfirmation" name="passwordconfirmation" type="text" class="validate">
                    <label for="passwordconfirmation" >Confirmed Password</label>
                  </div>
                  <p>
                   <input type="checkbox" id="test6"/>
                   <label for="test6"  >I review and remember</label>
                 </p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a id="close" class="waves-effect waves-light modal-close light-blue lighten-3 btn-flat " style="color:#ffffff;"><i class="material-icons">close</i></a>
              <a id="edit" class="waves-effect waves-light modal-close amber lighten-3 btn-flat "   style="color:#ffffff;"><i class="material-icons">edit</i></a>
            </div>
         </div>
            <ul class="tabs">
              <li class="tab">
                <a href="#dashboard"  >
                  <i class="material-icons ">dashboard</i>
                  <label>Dashboard</label>
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
              <li class="tab">
                <a href="#grades">
                  <i class="material-icons">assignment</i>
                  <label>Grades</label>
                </a>
              </li>
              <li class="tab">
                <a href="#news">
                  <i class="material-icons">theaters</i>
                  <label>Announcement</label>
                </a>
              </li>
              <li class="tab">
                <a href="#accounts">
                  <i class="material-icons">theaters</i>
                  <label>Accounts</label>
                </a>
              </li>
              <li class="tab" >
                <a href="#verifications" id="veriftab">
                  <i class="material-icons">theaters</i>
                  <label>Verification</label>
                </a>
              </li>
            </ul>
        </div>
    @endsection
    @section('content')
      <div class="user-info">
        {{-- @foreach ($student as $stud) --}}
          <div class="name">
              <label>Justice League</label>
          </div>
        {{-- @endforeach --}}
          <div class="time-out">
              <i class="material-icons">notifications_active</i>
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
          <div class="user-main-content tab-content" id="grades">
            <div class="content-container z-depth-1">
              <label>Grades</label>
            </div>
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
                  <schoolcalendarvue></schoolcalendarvue>
                </div>
              </div>
              <div class="side-nav-container">
                <div class="upcoming-events z-depth-1">
                  <h4>Sidebar 2</h4>
                </div>
              </div>
          </div>
      </div>
      </span>
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
