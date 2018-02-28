<template lang="html">

  <div class="recent-active-user-container white">
    <div class="recent-header z-depth-1 ">
      <label class="blue-grey-text">Recent Active Student</label>
    </div>
    <div class="recent-content">
      <div class="recent-user" v-for="log in logs">
        <img :src="'/storage/avatars/' + log.user_log.avatar + ''" alt="">
        <label class="student-info blue-grey-text">{{log.student_log.fname}} {{log.student_log.lname}} </label>
        <div class="recent-time ">
          <label class="blue-grey-text">{{log.created_at}}</label>
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

    created: function(){
      this.showLogs();
      this.timer = setInterval(this.showLogs, 3000)
    },

    methods:{
      showLogs(){
        var vm = this;
        axios.get(`show-logs`).then(function(response){
          vm.logs = response.data.logs.data;
          vm.pagination = response.data;
          console.log(response);
        });

      }
    }
  }
</script>
