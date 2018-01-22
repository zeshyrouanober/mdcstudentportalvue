<template lang="html">
  <div class="dashboard-student-container ">
    <div class="classes-grades z-depth-1" >
      <a class="btn-floating right "><i class="material-icons">print</i></a>
      <h6 class="tabs-content-header">Grade by Subjects</h6>
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
    <div class="forums z-depth-1" >
      <h1>Forums</h1>
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
