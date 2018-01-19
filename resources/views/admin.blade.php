@section('title','Dashboard | Admin')
  @extends('layouts.template')
    @section('side-nav')
        <div class="student-nav">
          <div class="avatar">
              {{-- @foreach ($student as $stud) --}}
                <i class="material-icons">face</i>
                <label>Admin</label>
              {{-- @endforeach --}}
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
            <div class="content-container">
              <div class="dashboard-content-up">
                <div class="number">
                  <div class="counter-container z-depth-1 teal">
                    <div class="title z-depth-1 ">
                      <div class="title-content">
                        <label>Users</label>
                      </div>
                      <div class="space"><a><i class="material-icons user">remove_red_eye</i></a></div>
                    </div>
                    <div class="icon">
                        <div class="icon-content">
                          <i class="material-icons">account_circle</i>
                        </div>
                    </div>
                    <div class="counter">
                      <div class="counter-content">
                        <h3 class="counters" data-count="150">0</h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="number">
                  <div class="counter-container z-depth-1 amber">
                    <div class="title z-depth-1 ">
                      <div class="title-content">
                        <label>Subjects</label>
                      </div>
                      <div class="space"><a><i class="material-icons subject">remove_red_eye</i></a></div>
                    </div>
                    <div class="icon">
                        <div class="icon-content">
                          <i class="material-icons">subject</i>
                        </div>
                    </div>
                    <div class="counter">
                      <div class="counter-content">
                        <h3 class="counters" data-count="120">0</h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="number">
                  <div class="counter-container z-depth-1 purple ">
                    <div class="title z-depth-1">
                      <div class="title-content ">
                        <label>Students</label>
                      </div>
                      <div class="space"><a><i class="material-icons student">remove_red_eye</i></a></div>
                    </div>
                    <div class="icon">
                        <div class="icon-content">
                          <i class="material-icons">people</i>
                        </div>
                    </div>
                    <div class="counter">
                      <div class="counter-content">
                        <h3 class="counters" data-count="250">0</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="dashboard-content-down z-depth-1">

              </div>
            </div>
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
            <div class="content-container ">
              <form method="post">
                <div class="content-header z-depth-1">
                  <label class="verification">Verifications </label>
                  <input type="text" name="numberVerification" id="number-of-verification" placeholder="Please provide only number">
                  <a class="waves-effect waves-light btn blue darken-1 generate">Generate</a>
                </div>
              </form>
              <div class="verification-tab z-depth-1">
               <div class="tabs-container">
                 <ul class="tabs">
                   <li class="tab"><a href="#verification" class="active" >Verifications</a></li>
                   <li class="tab"><a href="#activated">Activated</a></li>
                   <li class="tab"><a href="#notactivated">Not Activated</a></li>
                 </ul>
               </div>
               <div id="verification">
                  <div class="verification-list">
                    <table class="striped">
                      <thead>
                        <tr>
                          <th>Verification</th>
                          <th>Status</th>
                          <th>Activate by</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>asldkfjdkfldk </td>
                          <td>Used</td>
                          <td>Zeshyrou B. Anober</td>
                        </tr>
                        <tr>
                          <td>asldkfjdkfldk </td>
                          <td>Not Used</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>asldkfjdkfldk </td>
                          <td>Not Used</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>asldkfjdkfldk </td>
                          <td>Used</td>
                          <td>Zeshyrou B. Anober</td>
                        </tr>
                        <tr>
                          <td>asldkfjdkfldk </td>
                          <td>Used</td>
                          <td>Zeshyrou B. Anober</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
               </div>
               <div id="activated">
                 <div class="verification-list">
                   <table class="striped">
                     <thead>
                       <tr>
                           <th>Verification</th>
                           <th>Status</th>
                           <th>Activate by</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td>asdfkdjudlk</td>
                         <td>used</td>
                         <td>Jeronie Rulone</td>
                       </tr>
                       <tr>
                         <td>asdfkdjudlk</td>
                         <td>used</td>
                         <td>Jeronie Rulone</td>
                       </tr>
                       <tr>
                         <td>asdfkdjudlk</td>
                         <td>used</td>
                         <td>Jeronie Rulone</td>
                       </tr>
                       <tr>
                         <td>asdfkdjudlk</td>
                         <td>used</td>
                         <td>Jeronie Rulone</td>
                       </tr>
                     </tbody>
                   </table>
                 </div>
               </div>
               <div id="notactivated">
                 <div class="verification-list">
                   <table class="striped">
                     <thead>
                       <tr>
                           <th>Verification</th>
                           <th>Status</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td>asdjkhfdiufknlkiw</td>
                         <td>Not used</td>
                       </tr>
                       <tr>
                         <td>asdjkhfdiufknlkiw</td>
                         <td>Not used</td>
                       </tr>
                       <tr>
                         <td>asdjkhfdiufknlkiw</td>
                         <td>Not used</td>
                       </tr>
                       <tr>
                         <td>asdjkhfdiufknlkiw</td>
                         <td>Not used</td>
                       </tr>
                     </tbody>
                   </table>
                 </div>
               </div>
               <div class="pagination-container">
                 <ul class="pagination">
                   <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                   <li class="active"><a href="#!">1</a></li>
                   <li class="waves-effect waves-light"><a href="#!">2</a></li>
                   <li class="waves-effect waves-light"><a href="#!">3</a></li>
                   <li class="waves-effect waves-light"><a href="#!">4</a></li>
                   <li class="waves-effect waves-light"><a href="#!">5</a></li>
                   <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                 </ul>
               </div>
             </div>
           </div>
         </div>
          <div class="user-right-nav">
              <div class="side-nav-container">
                <div class="calendar z-depth-1">
                  <h4>SideBar 1</h4>
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
      @section('javascript')
        <script type="text/javascript">
            $(document).ready(function(){
              $('.modal').modal();
              $('select').material_select();
              $('ul.tabs').tabs();
              $('.tooltipped').tooltip({delay: 50});
            });
        </script>
      @endsection
    @endsection
    @section('footer')
      <footer class="page-footer  light-blue darken-1" >
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
