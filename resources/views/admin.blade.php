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
                <li><a href="#!">Sign Out</a></li>
              </ul>
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
                <script>
                  $(document).ready(function(){
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
              </div>
              <div class="dashboard-content-down z-depth-1">

              </div>
            </div>
          </div>
          <div class="user-main-content tab-content" id="subjects">
            <div class="content-container">
              <div class="content-header z-depth-1">
                <label>Subjects</label>
                <input type="text" name="search" value="" placeholder="Search Subject">
                <a href="#"><i class="material-icons">search</i></a>
              </div>
              <div class="departmentOption">
                <div class="spaceInputOption">
                  <form action="#">
                    <div class="file-field input-field">
                      <div class="btn blue darken-1">
                        <span>Import Subjects</span>
                        <input type="file">
                        <i class="material-icons">file_upload</i>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="uploadbutton">
                  <a href="!#"><i class="material-icons">send</i></a>
                </div>
              </div>
              <div class="student-list z-depth-1">
                <table class="striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Time</th>
                      <th>Room</th>
                      <th>Unit</th>
                      <th>Instructor</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>ITE 406</td>
                      <td>E-Business</td>
                      <td>6:00-7:00PM</td>
                      <td>CLAB 1</td>
                      <td>3</td>
                      <td>Benjie Lenteria</td>
                      <td>
                        <a href="#subject" id="viewsubject"class="modal-trigger"><i class="material-icons">remove_red_eye</i></a>
                        <a href="#" class="modal-trigger"><i class="material-icons" style="color:#fb8c00;">edit</i></a>
                      </td>
                    </tr>
                  </tbody>
                  <form method="post">
                    <div id="subject" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <div class="modal-fields">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <div class="input-field">
                            <i class="material-icons prefix">title</i>
                            <input id="title" name="title" type="text" class="validate">
                            <label for="title">Title</label>
                          </div>
                          <div class="input-field">
                            <i class="material-icons prefix">description</i>
                            <input id="description" name="description" type="text" class="validate">
                            <label for="description">Description</label>
                          </div>
                          <div class="input-field">
                            <i class="material-icons prefix">timeline</i>
                            <input id="time" name="time" type="text" class="validate">
                            <label for="time">Time</label>
                          </div>
                          <div class="input-field">
                            <i class="material-icons prefix">room</i>
                            <input id="room" name="room" type="text" class="validate">
                            <label for="room">Room</label>
                          </div>
                          <div class="input-field">
                            <i class="material-icons prefix">ac_unit</i>
                            <input id="unit" name="unit" type="text" class="validate">
                            <label for="unit">Unit</label>
                          </div>
                          <div class="input-field">
                            <i class="material-icons prefix">person_pin</i>
                            <input id="instructor" name="instructor" type="text" class="validate ">
                            <label for="instructor">Instructor</label>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <h5 class="left">Subject Details</h5>
                        <a id="announcementCreate" class="modal-action modal-close waves-effect waves-light btn light-blue darken-1 ">Back</a>
                        <div class="list-of-student-subject" style="height:100px;">
                          <label>List of students taking up this subject</label>
                        </div>
                      </div>
                  </form>
                    <script>
                    $(document).ready(function(){
                        $('.modal').modal();

                        // $('#viewsubject').click(function(event){
                        //   var title = $('#title').val();
                        //   var description = $('#description').val();
                        //
                        //   $.ajaxSetup({
                        //       headers: {
                        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //       },
                        //       dataType: "json",
                        //       contentType: "application/json; charset=utf-8"
                        //     });
                        //   $.get('create-announcement',{
                        //     'title':title,
                        //     'description':description
                        //   },function(data){
                        //     var text = 'submitted';
                        //     console.log(text);
                        //   });
                        // });
                      });
                    </script>
                  </div>
                </table>
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
          <div class="user-main-content tab-content" id="students">
            <div class="content-container">
              <div class="content-header z-depth-1">
                <label>Students</label>
                <input type="text" name="search" value="" placeholder="Search Student">
                <a href="#"><i class="material-icons">search</i></a>
              </div>
              <div class="departmentOption">
                <div class="spaceInputOption">
                  <form action="#">
                    <div class="file-field input-field">
                      <div class="btn blue darken-1">
                        <span>Import Student</span>
                        <input type="file">
                        <i class="material-icons">file_upload</i>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="uploadbutton">
                  <a href="!#"><i class="material-icons">send</i></a>
                </div>
              </div>
              <div class="student-list z-depth-1">
                <div class="select-container">
                  <div class="input-field">
                    <select>
                      <option value="" disabled selected> Department</option>
                      <option value="1">CBA</option>
                      <option value="2">CCICT</option>
                      <option value="3">CRIM</option>
                      <option value="3">CON</option>
                      <option value="3">COE</option>
                      <option value="3">HRM</option>
                    </select>
                    <label>By Department</label>
                  </div>
                  <div class="input-field">
                    <select>
                      <option value="" disabled selected> Year</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                    <label>By Year</label>
                  </div>
                </div>

                <table class="bordered highlight">
                  <thead>
                    <tr>
                      <th>Student ID</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>MI</th>
                      {{-- <th>Department</th> --}}
                      {{-- <th>Status</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $student)
                      <tr class="list-of-student modal-trigger" href="#student" >
                        <td id="student-id">{{$student->idnum}}</td>
                        <td id="firstname">{{$student->fname}}</td>
                        <td id="lastname">{{$student->lname}}</td>
                        <td id="mi">{{$student->mi}}</td>
                        <input type="hidden" name="" id="baranggay" value="{{$student->addb}}">
                        <input type="hidden" name="" id="town" value="{{$student->addt}}">
                        <input type="hidden" name="" id="province" value="{{$student->addp}}">
                        <input type="hidden" name="" id="birthday" value="{{$student->bdate}}">
                        <input type="hidden" name="" id="gender" value="{{$student->gender}}">
                        <input type="hidden" name="" id="status" value="{{$student->status}}">
                        <input type="hidden" name="" id="father" value="{{$student->father}}">
                        <input type="hidden" name="" id="mother" value="{{$student->mother}}">
                      </tr>
                    @endforeach
                  </tbody>
                  {{-- Student Modal --}}
                  <form method="get">
                    <div id="student" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <div class="modal-header light-blue darken-1">
                          <h5 class="left">Student Details</h5>
                        </div>
                        <div class="modal-fields">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <div class="input-field "id="student-label-active">
                            <input id="m-student_id" name="m-student_id" type="text" class="validate">
                            <label for="m-student_id">Student ID</label>
                          </div>
                          <div class="input-field" id="student-label-active">
                            <input id="m-firstname" name="m-firstname" type="text" class="validate">
                            <label for="m-firstname" >Firstname</label>
                          </div>
                          <div class="input-field" id="student-label-active">
                            <input id="m-lastname" name="m-lastname" type="text" class="validate">
                            <label for="m-lastname" >Lastname</label>
                          </div>
                          <div class="input-field" id="student-label-active">
                            <input id="m-mi" name="m-mi" type="text" class="validate">
                            <label for="m-mi" >Mi</label>
                          </div>
                          <div class="input-field" id="student-label-active">
                            <input id="m-addressb" name="m-addressb" type="text" class="validate">
                            <label for="m-addressb">Address Baranggay</label>
                          </div>
                          <div class="input-field" id="student-label-active">
                            <input id="m-addresst" name="m-addresst" type="text" class="validate">
                            <label for="m-addresst">Address Town</label>
                          </div>
                          <div class="input-field" id="student-label-active">
                            <input id="m-addressp" name="m-addressp" type="text" class="validate">
                            <label for="m-addressp">Address Province</label>
                          </div>
                          <div class="input-field" id="student-label-active">
                            <input id="m-birthday" name="m-birthday" type="text" class="validate">
                            <label for="m-birthday">Birthday</label>
                          </div>
                          <div class="input-field" id="student-label-active">
                            <input id="m-gender" name="m-gender" type="text" class="validate">
                            <label for="m-gender">Gender</label>
                          </div>
                          <div class="input-field" id="student-label-active">
                            <input id="m-status" name="m-status" type="text" class="validate">
                            <label for="m-status">Status</label>
                          </div>
                          <div class="input-field" id="student-label-active">
                            <input id="m-father" name="m-father" type="text" class="validate">
                            <label for="m-father">Father</label>
                          </div>
                          <div class="input-field" id="student-label-active">
                            <input id="m-mother" name="m-mother" type="text" class="validate">
                            <label for="m-mother">Mother</label>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <a class="modal-action modal-close waves-effect waves-light btn  light-blue  " id="saveChanges">Save Changes</a>
                        <a href="#" class="modal-action modal-close waves-effect waves-light btn light-blue darken-1 left">Subjects</a>
                      </div>
                  </form>
                    <script>
                      $(document).ready(function(){
                          $('.modal').modal();

                          $(document).on('click','.list-of-student',function(event){

                              var studentId = $(this).find('#student-id').text();
                              var studentFirstname = $(this).find('#firstname').text();
                              var studentLastname = $(this).find('#lastname').text();
                              var studentMi = $(this).find('#mi').text();
                              var studentB = $(this).find('#baranggay').val();
                              var studentT = $(this).find('#town').val();
                              var studentP = $(this).find('#province').val();
                              var studentGender = $(this).find('#gender').val();
                              var studentStatus = $(this).find('#status').val();
                              var studentBirthday = $(this).find('#birthday').val();
                              var studentMother = $(this).find('#mother').val();
                              var studentFather = $(this).find('#father').val();


                              $('#m-student_id').val(studentId);
                              $('#m-firstname').val(studentFirstname);
                              $('#m-lastname').val(studentLastname);
                              $('#m-mi').val(studentMi);
                              $('#m-addressb').val(studentB);
                              $('#m-addresst').val(studentT);
                              $('#m-addressp').val(studentP);
                              $('#m-gender').val(studentGender);
                              $('#m-status').val(studentStatus);
                              $('#m-birthday').val(studentBirthday);
                              $('#m-mother').val(studentMother);
                              $('#m-father').val(studentFather);

                              $("#student-label-active").parent().find("label").addClass("active");

                          });

                          $(document).on('click','#saveChanges',function(event){
                              var studentId = $('#m-student_id').val();
                              var fname = $('#m-firstname').val();
                              var lname = $('#m-lastname').val();
                              var mi = $('#m-mi').val();
                              var addressB = $('#m-addressb').val();
                              var addressT = $('#m-addresst').val();
                              var addressP = $('#m-addressp').val();
                              var gender = $('#m-gender').val();
                              var status = $('#m-status').val();
                              var birthday = $('#m-birthday').val();
                              var mother = $('#m-mother').val();
                              var father = $('#m-father').val();

                              $.ajaxSetup({
                                  headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  },
                                  dataType: 'json',
                                  contentType: "application/json; charset=utf-8"
                                });

                              $.get('update-student',{
                                'id' : studentId,
                                'lastname' : lname,
                                'firstname' : fname,
                                'mi' : mi,
                                'addressBaranggay' : addressB,
                                'addressTown' : addressT,
                                'addressProvince' : addressP,
                                'gender' : gender,
                                'status' : status,
                                'birthday' : birthday,
                                'mother' : mother,
                                'father' : father
                              },function(data){
                                console.log(data);
                              });
                          });
                        });
                    </script>
                </table>
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
          <div class="user-main-content tab-content" id="grades">
            <div class="content-container z-depth-1">
              <label>Grades</label>
            </div>
          </div>
          <div class="user-main-content tab-content" id="news" >
            <span id="app"><announcementvue></announcementvue></span>
          </div>
          <div class="user-main-content tab-content" id="accounts">
            <span id="account"><accountvue></accountvue></span>
          </div>
          <div class="user-main-content tab-content" id="verifications">
            <div class="content-container ">
              <form method="post">
                <div class="content-header z-depth-1">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <label class="verification">Verifications </label>
                  <input type="text" name="numberVerification" id="number-of-verification" placeholder="Please provide only number">
                  <a class="waves-effect waves-light btn blue darken-1 generate">Generate</a>
                </div>
              </form>
              <script>
                  $(document).ready(function(event){


                    $('.generate').click(function(event){
                        var numberOfVerification = $('#number-of-verification').val();

                      $('')
                      $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          dataType: "json",
                          contentType: "application/json; charset=utf-8"
                        });

                      $.get('generate-verification',{
                        'numberOfVerification':numberOfVerification

                      },function(data){
                        console.log(data);
                      });
                    });
                  });
              </script>
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
