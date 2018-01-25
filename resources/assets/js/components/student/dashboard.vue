<template lang="html">
  <div class="dashboard-student-container ">
    <div class="student-dashboard-counter">
      <div class="present-subjects z-depth-1">
        <h3>Present Subjects</h3>
      </div>
      <div class="taken-subjects z-depth-1">
        <h3>Taken Subjects</h3>
      </div>
      <div class="your-status z-depth-1">
        <h3> Student Status </h3>
      </div>
    </div>
    <div class="classes-grades z-depth-1" >
      <a class="btn-floating right "><i class="material-icons">print</i></a>
      <label class="tabs-content-header">Present Subject</label>
      <table class="striped">
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
            <td>Angelina Jolie</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';


    export default {
      data(){
        return{
          subjects:[],

        }
      },
      mounted(){
        this.showSubjectsWithGrade();
      },
      props:['user'],

      methods:{
        showSubjectsWithGrade(){
          var vm = this;
          axios.get(`list-of-subject-with-grade`).then(function(response){
            vm.subjects = response.data;
            console.log(response);
          });
        }
      }
    }
</script>
