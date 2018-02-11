<template lang="html">

  <div class="active-user-container">
    <div class="active-user-header z-depth-1">
      <label class="blue-grey-text">Active Student</label>
    </div>
    <div class="active-user-content">
      <div class="active-user-details white" v-for="user in activeuser">
        <img :src="'/storage/avatars/' + user.avatar + ''" alt="">
        <label class="user-details blue-grey-text" >{{user.student.fname}} {{user.student.lname}}</label>
        <label class="active-sign green-text">•</label>
      </div>
    </div>
  </div>

</template>

<script>

  import axios from 'axios';

  export default{
    data () {
     return {
        activeuser :[],
        timer:''
     }
   },

   mounted(){
     this.fetchActiveUser()
   },

   // created: function(){
   //   this.fetchActiveUser();
   //   this.timer = setInterval(this.fetchActiveUser, 3000)
   // },

   methods:{
     fetchActiveUser(){
       var vm = this;
       axios.get(`active-student`).then(function(response){
         vm.activeuser = response.data;
       });
     }
   },
  }
</script>
