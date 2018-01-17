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
      <div class="user-info student-header">
          <div class="name">
              <label>{{Auth::user()->student->fname}} {{Auth::user()->student->lname}} </label>
          </div>
          <div class="time-out">
              <i class="material-icons">notifications_active</i>
              <label>{{ date('m-d-Y h:i') }}</label>
              <ul id='dropdown1' class='dropdown-content' >
                <li><a href="#!">My Profile</a></li>
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
      <div class="user-content">
          <div class="user-main-content tab-content" id="dashboard">
              <div class="grade-classes z-depth-1">
                <label>For classes and grades</label>
                <i class="material-icons">class</i>
              </div>
              <div class="forums z-depth-1">
                <label>For forums by subject</label>
                <i class="material-icons">forum</i>
              </div>
              <div class="news z-depth-1">
                <label>For news</label>
                <i class="material-icons">theaters</i>
              </div>
          </div>
          <div class="user-main-content tab-content" id="academics">
              <h1>Academics</h1>
          </div>
          <div class="user-main-content tab-content" id="evaluation">
              <h1>Evaluation</h1>
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
                <h4>Notifications</h4>
              </div>
            </div>
            <div class="side-nav-container">
              <div class="upcoming-events z-depth-1">
                <h4>Upcoming events</h4>
              </div>
            </div>
            <div class="side-nav-container">
              <div class="todos z-depth-1 ">
                  <form  method="post">
                    <div id="todosModal" class="modal">
                      <div class="modal-header">
                        <a href="#" class="modal-action modal-close  btn-floating btn-small red waves-effect waves-light right"><i class="material-icons left">clear</i></a>
                      </div>
                      <div class="modal-content">
                        <label>Create a todo <i class="material-icons">event_note</i></label>
                        <div class="modal-fields">
                            <div class="input-field">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <input id="title" type="text" class="validate" name="title" required>
                              <label for="title">Title</label>
                            </div>
                            <div class="input-field">
                              <input id="description" type="text" class="validate" name="description" required>
                              <label for="description">Description</label>
                            </div>
                            <div class="input-field">
                              <input id="date" type="text" class="datepicker" name="date" required>
                              <label for="date">Remind me on this day </label>
                              <script type="text/javascript">
                              $('.datepicker').pickadate({
                                  selectMonths: true, // Creates a dropdown to control month
                                  selectYears: 15, // Creates a dropdown of 15 years to control year
                                  format: 'yyyy-mm-dd'
                                  });
                              </script>
                            </div>
                            {{-- <div class="input-field">
                              <input id="time" type="text" class="timepicker" name="time" required>
                              <label for="time">Remind me on this time</label>
                              <script type="text/javascript">
                              $('.timepicker').pickatime({
                                format:"HH:ii:SS",
                                twelvehour:'false'
                              });
                              </script>
                            </div> --}}
                        </div>
                      </div>
                      <div class="modal-footer">
                        <a class="modal-action modal-close green accent-3 waves-effect waves-light btn " id="todoCreate">Create</a>
                      </div>
                    </div>
                  </form>
                    <script type="text/javascript">
                    $(document).ready(function(){
                      // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
                      $('.modal').modal();
                      });
                    </script>
                  <div class="todos-header ">
                    <i class="material-icons">event_note</i>
                    <label>My Todos</label>
                    <a class="btn-floating btn-small green accent-3 right tooltipped waves-effect waves-light btn modal-trigger" data-position="left" data-delay="50" data-tooltip="Create a todo" href="#todosModal" >
                      <i class=" material-icons">add</i>
                    </a>
                  </div>
                  <div class="todos-content">
                    <ul class="collapsible" data-collapsible="accordion">
                      @foreach ($todos as $todo)
                       <li>
                         <div class="collapsible-header "><i class="material-icons">event_note</i>{{$todo->title}} </div>
                         <div class="collapsible-body todos-body">
                           <label>{{$todo->date}}</label>
                           <div class="todos-description">
                             <label>{{$todo->description}}</label>
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
                     @endforeach
                      </ul>
                      <script>
                        $(document).ready(function(){
                          $('.collapsible').collapsible();
                        });
                      </script>
                  </div>
                  <script>
                      $(document).ready(function(){
                        $('#todoCreate').click(function(event){
                          var title = $('#title').val();
                          var description = $('#description').val();
                          var date = $('#date').val();
                          // var time = $('#time').val();
                          $.ajaxSetup({
                              headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                              dataType: "json",
                              contentType: "application/json; charset=utf-8"
                            });
                          $.get('dashboard',{
                            'title':title,
                            'description':description,
                            'date': date,
                            // 'time' : time
                          },function(data){
                            console.log(data);
                          });
                        });
                      });
                  </script>
              </div>
            </div>
          </div>
      </div>
    @endsection
    @section('footer')
      <footer class="page-footer light-blue darken-1" >
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
    @endsection
