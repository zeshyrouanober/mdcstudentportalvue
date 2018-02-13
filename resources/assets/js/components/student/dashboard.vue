<template lang="html">
  <div class="dashboard-student-container ">
    <div class="student-status white z-depth-1">
      <div class="student-status-up">
        <label>Major : <b>{{major}}</b></label>
        <label>Course & year : <b>{{course}} - {{year}}</b></label>
      </div>
      <div class="student-status-up">
        <label >Status : <b>{{status}}</b></label>
        <label>Academic Standing : <b>GOOD</b></label>
      </div>
    </div>
    <div class="student-widget">
      <div class="my-widget ">
        <div class="widget-container white z-depth-1">
          <div class="widget-icon teal">
            <i class="material-icons white-text">subject</i>
          </div>
          <div class="widget-content">
            <div class="widget-title ">
              <label class="teal-text">Current Subjects</label>
            </div>
            <div class="widget-data ">
              <label class="teal-text">{{currentSubject}}</label>
            </div>
          </div>
        </div>
      </div>
      <div class="my-widget ">
        <div class="widget-container white z-depth-1">
          <div class="widget-icon indigo">
            <i class="material-icons white-text">subject</i>
          </div>
          <div class="widget-content">
            <div class="widget-title ">
              <label class="indigo-text">Taken Subjects</label>
            </div>
            <div class="widget-data ">
              <label class="indigo-text">{{takenSubjects}}</label>
            </div>
          </div>
        </div>
      </div>
      <div class="my-widget ">
        <div class="widget-container white z-depth-1">
          <div class="widget-icon amber">
            <i class="material-icons white-text">subject</i>
          </div>
          <div class="widget-content">
            <div class="widget-title ">
              <label class="amber-text">All <br> subjects</label>
            </div>
            <div class="widget-data ">
              <label class="amber-text">60</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mobile-events">
      <div class="mobile-events-container white z-depth-1">
        <div class="mobile-header z-depth-1">
          <i class="material-icons blue-text">update</i>
          <label>  Updates and Announcement</label>
        </div>
        <div class="mobile-content">
          <ul class="collapsible" data-collapsible="accordion">
            <li v-for="announce in announcement">
              <div class="collapsible-header">
                <label class="blue-grey-text">{{announce.title}}</label>
                <label class="date blue-text">{{announce.created_at}}</label>
              </div>
              <div class="collapsible-body blue-grey-text"><span>{{announce.description}}</span></div>
            </li>
          </ul>
        </div>
      </div>
      <br>
      <div class="mobile-events-container white z-depth-1">
        <div class="mobile-header z-depth-1">
          <i class="material-icons blue-text">event_available</i>
          <label> Upcoming events</label>
        </div>
        <div class="mobile-content">
          <ul class="collapsible" data-collapsible="accordion">
            <li v-for="ue in upcomingevents">
              <div class="collapsible-header ">
                <label class="blue-grey-text">{{ue.title}}</label>
                <label class="date blue-text">{{ue.date}}</label>
              </div>
              <div class="collapsible-body blue-grey-text"><span>{{ue.desc}}</span></div>
            </li>
          </ul>
        </div>
      </div>
      <br><br>
    </div>
    <div class="classes-grades z-depth-2" >
      <div class="classes-grades-header blue darken-3">
        <!-- <a class="btn-floating right "><i class="material-icons">print</i></a> -->
        <label class="tabs-content-header white-text">Present Subjects</label>
        <a  v-on:click="gradePDF()"  class="btn-floating waves-effect waves-light white "><i class="material-icons blue-text">print</i></a>

      </div>
      <div class="classes-grades-content">
        <table class="striped" style="background-color:#ffffff">
          <thead>
            <tr>
              <th>Subject</th>
              <th>Midterm</th>
              <th>Final</th>
              <th>Rating</th>
              <th>Teacher</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="subject in subjects">
              <td data-label="Subject :">{{subject.descript}}</td>
              <td data-label="Midterm :">{{subject.pivot.mgrade}}</td>
              <td data-label="Final :">{{subject.pivot.fgrade}}</td>
              <td data-label="Rating :">{{subject.pivot.rating}}</td>
              <td data-label="Teacher :">Teacher name</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';


    export default {
      data(){
        return{
          subjects:[],
          major:'',
          status:'',
          course:'',
          year:'',
          rating:'',
          weightedAverage:'',
          currentSubject:'',
          takenSubjects:'',
          upcomingevents:[],
          pagination:[],
          announcement:[],
        }
      },
      mounted(){
        this.showSubjectsWithGrade();
        this.studentStatus();
        this.currentSubjectCount();
        this.takenSubjectCount();
        this.showUpcomingEvents();
        this.showAnnouncements();
      },
      props:['user'],

      methods:{
        showSubjectsWithGrade(){
          var vm = this;
          axios.get(`list-of-subject-with-grade`).then(function(response){
            vm.subjects = response.data;
            vm.numberOfSubject = vm.subjects.length;
          });
        },

        studentStatus(){
          var vm = this;
          axios.get(`student-dashboard-status`).then(function(response){
            vm.course = response.data.course[0].cr_acrnm;
            vm.year = response.data.course[0].pivot.year;
            vm.major = response.data.course[0].major;
            vm.status = response.data.course[0].pivot.en_status;
          });
        },

        gradePDF(){
          var vm = this;
          axios.get(`student-grade-pdf`).then(function(response){
            location.href="student-grade-pdf";
            Materialize.toast('Grade downloaded !',3000,'rounded light-blue lighten-1');
          });
        },

        currentSubjectCount(){
          var vm = this;
          axios.get(`count-current-subject`).then(function(response){
            vm.currentSubject = response.data;
          });
        },

        takenSubjectCount(){
          var vm = this;
          axios.get(`count-taken-subjects`).then(function(response){
            vm.takenSubjects = response.data[0].subjects_taken.length;
          });
        },

        showUpcomingEvents(){
          var vm = this;
          axios.get(`show-upcomingevents`).then(function(response){
            vm.upcomingevents = response.data.upcomingevents.data;
            vm.pagination = response.data;
          });
        },

        showAnnouncements(){
          var vm = this;
          axios.get(`show-announcement`).then(function(response){
            vm.announcement = response.data.announcement.data;
            vm.pagination = response.data;
          });
        }

      }
    }
</script>
