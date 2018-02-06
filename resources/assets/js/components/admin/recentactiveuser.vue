<template lang="html">

  <div class="recent-active-user-container">
    <div class="recent-header z-depth-1 ">
      <label>Recent Active Student</label>
    </div>
    <div class="recent-content">
      <div class="recent-user" v-for="log in logs">
        <img src="images/school-logo2.png" alt="">
        <label>{{log.username}}</label>
        <div class="recent-time">
          <label>{{log.created_at}}</label>
        </div>
      </div>
    </div>
  </div>

</template>

<script>

  import axios from 'axios';

  export default {
    data(){
      return{
        logs:[],
        pagination:[],
        timer:''
      }
    },

    mounted(){
      this.showLogs()
    },

    methods:{
      showLogs(){
        var vm = this;
        axios.get(`show-logs`).then(function(response){
          vm.logs = response.data.logs.data;
          vm.pagination = response.data;
        });

      }
    }
  }
</script>
