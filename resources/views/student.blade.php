@section('title','Dashboard | Student')
  @extends('layouts.template')
    @section('side-nav')
        <div class="student-nav">
          <div class="avatar">
                <i class="material-icons">face</i>
                <label>{{Auth::user()->username}}</label>
          </div>
            <ul class="tabs">
              <li class="tab">
                <a href="#dashboard" class="active">
                  <i class="material-icons ">dashboard</i>
                  <label>Dashboard</label>
                </a>
              </li>
              <li class="tab">
                <a href="#academics">
                  <i class="material-icons">school</i>
                  <label>Academics</label>
                </a>
              </li>
              <li class="tab">
                <a href="#evaluation">
                  <i class="material-icons">school</i>
                  <label>Evaluation</label>
                </a>
              </li>
              <li class="tab">
                <a href="#calendar">
                  <i class="material-icons">today</i>
                  <label>Calendar</label>
                </a>
              </li>
              <li class="tab">
                <a href="#news">
                  <i class="material-icons">theaters</i>
                  <label>News</label>
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
          <div class="user-main-content tab-content" id="academics">
              <h1>Academics</h1>
          </div>
          <div class="user-main-content tab-content" id="evaluation">
            <evaluationvue :user="{{Auth::user()}}"></evaluationvue>
          </div>
          <div class="user-main-content tab-content" id="calendar">
              <h1>Calendar</h1>
          </div>
          <div class="user-main-content tab-content" id="news">
              <h1>News</h1>
          </div>
          <div class="user-right-nav">
            <div class="side-nav-container">
              <div class="calendar z-depth-1">
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
                  <div class="todos-header ">
                    <i class="material-icons">event_note</i>
                    <label>My Todos</label>
                    <a class="btn-floating btn-small green accent-3 right tooltipped waves-effect waves-light btn modal-trigger" data-position="left" data-delay="50" data-tooltip="Create a todo" href="#todosModal" >
                      <i class=" material-icons">add</i>
                    </a>
                  </div>
                  <div class="todos-content">
                    <ul class="collapsible" data-collapsible="accordion">
                       <li>
                         <div class="collapsible-header "><i class="material-icons">event_note</i></div>
                         <div class="collapsible-body todos-body">
                           <label>Date</label>
                           <div class="todos-description">
                             <label>Description</label>
                           </div>
                           <div class="todos-button">
                             <span>
                               <a class="btn-floating btn-small  indigo accent-4 waves-light">
                                 <i class="material-icons">mode_edit</i>
                               </a>
                             </span>
                             <span>
                               <a class="btn-floating btn-small  red  waves-effect waves-light">
                                 <i class="material-icons">delete</i>
                               </a>
                             </span>
                           </div>
                         </div>
                       </li>
                      </ul>
                  </div>
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
    @endsection
