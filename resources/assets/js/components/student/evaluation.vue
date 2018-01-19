<template lang="html">
  <div class="evaluation-container">
    <div class="evaluation z-depth-1">
      <h6>Taken Subjects</h6>
      <table class="striped">
        <thead>
          <tr>
            <th>Subject</th>
            <th>Midterm</th>
            <th>Final</th>
            <th>Rating</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="subject in takenSubject">
            <td>{{subject.descript}}</td>
            <td>{{subject.pivot.mgrade}}</td>
            <td>{{subject.pivot.fgrade}}</td>
            <td>{{subject.pivot.rating}}</td>
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
      takenSubject:[],
    }
  },

  mounted(){
    this.showSubjectTaken();
  },
  props:['user'],

  methods:{
    showSubjectTaken(){
      var vm = this;
      axios.get(`show-subject-taken`).then(function(response){
        vm.takenSubject = response.data;
        console.log(response);
      });
    }
  }

}
