<template lang="html">
  <div class="dashboard-student-container ">
    <div class="student-status z-depth-1">
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
        <div class="widget-container z-depth-1">
          <div class="widget-icon teal">
            <i class="material-icons white-text">account_circle</i>
          </div>
          <div class="widget-content">
            <div class="widget-title ">
              <label class="teal-text">Users</label>
            </div>
            <div class="widget-data ">
              <label class="teal-text">{{userCounter}}</label>
            </div>
          </div>
        </div>
      </div>
      <div class="my-widget ">
        <div class="widget-container z-depth-1">
          <div class="widget-icon indigo">
            <i class="material-icons white-text">subject</i>
          </div>
          <div class="widget-content">
            <div class="widget-title ">
              <label class="indigo-text">Subjects</label>
            </div>
            <div class="widget-data ">
              <label class="indigo-text">{{subjectCounter}}</label>
            </div>
          </div>
        </div>
      </div>
      <div class="my-widget ">
        <div class="widget-container z-depth-1">
          <div class="widget-icon amber">
            <i class="material-icons white-text">people</i>
          </div>
          <div class="widget-content">
            <div class="widget-title ">
              <label class="amber-text">Students</label>
            </div>
            <div class="widget-data ">
              <label class="amber-text">{{studentCounter}}</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="classes-grades z-depth-2" >
      <div class="classes-grades-header blue darken-3">
        <!-- <a class="btn-floating right "><i class="material-icons">print</i></a> -->
        <label class="tabs-content-header">Present Subjects</label>
        <a  v-on:click="gradePDF()"  class="btn-floating waves-effect waves-light "><i class="material-icons">print</i></a>

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
              <td>{{subject.descript}}</td>
              <td>{{subject.pivot.mgrade}}</td>
              <td>{{subject.pivot.fgrade}}</td>
              <td>{{subject.pivot.rating}}</td>
              <td>Teacher name</td>
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
          numberOfSubject:''
        }
      },
      mounted(){
        this.showSubjectsWithGrade();
        this.studentStatus();
      },
      props:['user'],

      methods:{
        showSubjectsWithGrade(){
          var vm = this;
          axios.get(`list-of-subject-with-grade`).then(function(response){
            vm.subjects = response.data;
            vm.numberOfSubject = vm.subjects.length;
            console.log(response);
          });
        },

        studentStatus(){
          var vm = this;
          axios.get(`student-dashboard-status`).then(function(response){
            vm.course = response.data.course[0].cr_acrnm;
            vm.year = response.data.course[0].pivot.year;
            vm.major = response.data.course[0].major;
            vm.status = response.data.course[0].pivot.en_status;
            console.log(response);
          });
        },

        gradePDF(){
          var vm = this;
          axios.get(`student-grade-pdf`).then(function(response){
            location.href="student-grade-pdf";
            Materialize.toast('Grade downloaded !',3000,'rounded light-blue lighten-1');
          });
        }

      }
    }
</script>
