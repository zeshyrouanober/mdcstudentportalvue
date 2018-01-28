<template lang="html">
  <div class="user-profile-container ">
    <div class="user-profile-details z-depth-1">
      <div class="user-picture ">
          <label class="header">Basic profile</label>
          <img src="images/uploads/avatar.jpg" alt="">
          <label >{{student.idnum}}</label>
      </div>
      <div class="user-details ">
          <label >{{student.fname}} {{student.lname}}</label>
          <label >{{course}} - {{year}}</label>
          <label >{{student.bdate}}</label>
          <label >{{student.gender}}</label>
          <label >{{student.addb}},{{student.addt}},{{student.addp}}</label>
      </div>
    </div>
    <div class="account-details ">
      <div class="account-content z-depth-1">
        <label class="header">Update your account</label>
          <div class="input-field">
           <i class="material-icons prefix">account_circle</i>
           <input id="icon_prefix" type="text" class="validate">
           <label for="icon_prefix" >Username</label>
         </div>
         <div class="input-field">
            <i class="material-icons prefix">lock</i>
            <input id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix">Current Password</label>
        </div>
        <div class="input-field">
           <i class="material-icons prefix">lock_open</i>
           <input id="icon_prefix" type="password" class="validate">
           <label for="icon_prefix">New Password</label>
       </div>
       <div class="input-field">
          <i class="material-icons prefix">lock_outline</i>
          <input id="icon_prefix" type="password" class="validate">
          <label for="icon_prefix">Confirm Password</label>
        </div>
        <button class="btn waves-effect waves-light right" type="submit" name="action">update
          <i class="material-icons right">send</i>
        </button>
      </div>
      <div class="right-profile">
        <div class="right-profile-one  z-depth-1">
          <label class="header">Something to put</label>
        </div>
        <div class="right-profile-one  z-depth-1">
          <label class="header">Something to put</label>

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
        student: [],
        course:[],
        year : '',
        isUpdate:false
      }
    },

    mounted(){
      isUpdate:true,
      this.studentAcademicDetails()
    },

    methods:{

      studentAcademicDetails(){
        var vm = this;
        axios.get(`student-course`).then(function(response){
          vm.student = response.data.student;
          vm.course = response.data.course[0].cr_acrnm;
          vm.year = response.data.course[0].pivot.year;
        });
      }

    }
  }
</script>
