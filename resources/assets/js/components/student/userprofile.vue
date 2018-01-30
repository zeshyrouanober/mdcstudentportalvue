<template lang="html">
  <div class="user-profile-container ">
    <div class="user-profile-details z-depth-1">
      <div class="user-picture ">
          <label class="header">Basic profile</label>
          <a href="#avatar" class="tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Update your photo" ><i class="material-icons blue-text">settings</i></a>
          <img :src="'/storage/avatars/' + user.avatar + ''" alt="" >
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
      <div id="avatar" class="modal modal-fixed-footer">
        <div class="modal-content">
          <div class="modal-header light-blue ">
            <h4 id="todos-header ">Update Avatar</h4>
          </div>
          <div class="modal-fields">
            <div class="input-field">
              <div class="preview">
                <img :src="image" alt="">
              </div>
              <div class="input-file-container">
                  <div class="file-field input-field">
                    <div class="btn-flat light-blue center white-text">
                        <span>Select file</span>
                        <input type="file" @change="onFileChange"  >
                    </div>
                     <div class="file-path-wrapper">
                       <input class="file-path validate"  type="text">
                     </div>
                   </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a id="cancel" class="btn btn-flat waves-effect waves-light white modal-close">Cancel</a>
          <a class="btn btn-flat waves-effect waves-light modal-close white-text light-blue" v-on:click="updateAvatar()">Update</a>
        </div>
      </div>
    <div class="account-details ">
      <div class="account-content z-depth-1">
        <label class="header">Update your account</label>
          <div class="input-field">
           <i class="material-icons prefix">account_circle</i>
           <input id="username" disabled type="text" v-model="username" class="validate">
           <!-- <label for="username" :class="[isUpdate == true ? 'active' : '']" >Username</label> -->
         </div>
         <div class="input-field">
            <i class="material-icons prefix">lock</i>
            <input id="currentpassword"  required v-model="currentPassword"type="text" class="validate">
            <label for="currentpassword">Current Password</label>
        </div>
        <div class="input-field">
           <i class="material-icons prefix">lock_open</i>
           <input id="password" required v-model="newPassword" name="password" type="password" class="validate">
           <label for="password">New Password</label>
       </div>
       <div class="input-field">
          <i class="material-icons prefix">lock_outline</i>
          <input id="password_confirmation" required v-model="confirmPassword" name="password_confirmation" type="password" class="validate">
          <label for="password_confirmation">Confirm Password</label>
        </div>
        <button class="btn waves-effect waves-light light-blue" v-on:click="userUpdate()">update
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
        username:'',
        isUpdate:false,
        currentPassword:'',
        newPassword:'',
        confirmPassword:'',
        image:''
      }
    },

    mounted(){
      isUpdate:true,
      this.studentAcademicDetails()
    },

    props:['user'],

    methods:{

      studentAcademicDetails(){
        var vm = this;
        axios.get(`student-course`).then(function(response){
          vm.student = response.data.student;
          vm.course = response.data.course[0].cr_acrnm;
          vm.year = response.data.course[0].pivot.year;
          vm.username = response.data.student.idnum;
        });
      },

      userUpdate(){
        var vm = this;
        axios.put(`student-user-update`,{
          'currentPassword' : this.currentPassword,
          'newPassword' : this.newPassword,
          'confirmPassword' : this.confirmPassword
        }).then(function(response){
          console.log(response);
          vm.currentPassword = '';
          vm.newPassword = '';
          vm.confirmPassword = '';
        }).catch(function(error){
          console.log(error);
        });
      },

      updateAvatar(){
        var vm = this;
        axios.post(`update-avatar`,{
          'image' : this.image
        }).then(function(response){
          console.log(response);
          Materialize.toast('Uploaded' , 3000,'rounded');
        });
      },

      onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        if (!files.length)
          return;
        this.createImage(files[0]);
      },
      createImage(file) {
        var image = new Image();
        var reader = new FileReader();
        var vm = this;

        reader.onload = (e) => {
          vm.image = e.target.result;
      };
        reader.readAsDataURL(file);
      },
      removeImage: function (e) {
        this.image = '';
      }
    }
  }

</script>
