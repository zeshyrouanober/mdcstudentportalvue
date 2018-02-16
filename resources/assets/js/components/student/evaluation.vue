top<template lang="html">
  <div class="evaluation-container">
    <div class="evaluation z-depth-2">
      <div class="evaluation-header blue darken-3 ">
          <label>Subjects Enrolled</label>
      </div>
      <div class="evaluation-content">
        <table class="striped" style="background-color:#ffffff">
          <thead>
            <tr>
              <th class="blue-text">Subject</th>
              <th class="blue-text">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="takensubject in takensubjects">
              <td data-label="Subject :" >{{takensubject.descript}}</td>
              <td data-label="Status :" class="green-text" v-if="takensubject.pivot.rating <= 2.0 ">Passed</td>
              <td data-label="Status :" v-else class="red-text">Failed</td>
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
      takensubjects:[],
      rating:0
    }
  },

  created(){
    this.showTakenSubjects();
  },

  methods:{
    showTakenSubjects(){
      var vm = this;
      axios.get(`show-subject-taken`).then(function(response){
          vm.takensubjects = response.data[0].subjects_taken;
      });
    }
  }
}
</script>
