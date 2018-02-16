<template lang="html">
  <div class="user-profile-container ">
    <div class="user-profile-details z-depth-1">
      <div class="user-picture ">
          <label class="header">Basic profile</label>
          <a href="#avatar" class="tooltipped modal-trigger" v-on:click="imagePreview = true"data-position="bottom" data-delay="50" data-tooltip="Update your photo" ><i class="material-icons blue-text">settings</i></a>
          <img :src="'/storage/avatars/' + user.avatar + ''" alt="">
          <label >{{student.idnum}}</label>
      </div>
      <div class="user-details z-depth-1" >
          <label>{{major}}</label>
          <label >{{student.fname}} {{student.lname}}</label>
          <label >{{course}} - {{year}}</label>
          <label >{{student.bdate}}</label>
          <label >{{student.gender}}</label>
          <label >{{student.addb}},{{student.addt}},{{student.addp}}</label>
      </div>

      <div class="account-details">
        <div class="account-content  z-depth-1 ">
          <label class="header">Update your account</label>
          <div class="input-field">
             <i class="material-icons prefix">account_circle</i>
             <input id="username" disabled type="text" v-model="username" class="validate">
             <!-- <label for="username" :class="[isUpdate == true ? 'active' : '']" >Username</label> -->
           </div>
           <div class="input-field" id="currentPassword">
              <div class="field">
                <i class="material-icons prefix">lock</i>
                <input id="currentpassword"  required v-model="currentPassword" type="password" class="validate">
                <label for="currentpassword">Current Password</label>
              </div>
              <div class="currentBtn">
                <a  v-on:click="userCurrentPassword()" class="btn small blue darken-1">Confirm</a>
              </div>
          </div>
          <div class="input-field">
             <i class="material-icons prefix">lock_open</i>
             <input id="password" disabled required v-model="newPassword" name="password" type="password"  class="validate ">
             <label for="password" >New Password</label>
         </div>
         <div class="input-field">
            <i class="material-icons prefix">lock_outline</i>
            <input id="password_confirmation" disabled required v-model="confirmPassword" name="password_confirmation" type="password" class="validate">
            <label for="password_confirmation">Confirm Password</label>
          </div>
          <button class="btn waves-effect waves-light blue darken-1 disabled" id="updateBtn" v-on:click="userUpdate()">update
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </div>
      <div id="avatar" class="modal modal-fixed-footer">
        <div class="modal-content">
          <div class="modal-header blue darken-3">
            <h4 id="todos-header ">Update Avatar</h4>
          </div>
          <div class="modal-fields">
            <div class="input-field">
              <div class="preview">
                <img v-if="imagePreview == true" :src="'/storage/avatars/' + user.avatar + ''" alt="" >
                <img v-else :src="image" alt="">
              </div>
              <div class="input-file-container">
                  <div class="file-field input-field">
                    <div class="btn-flat light-blue center white-text" v-on:click="imagePreview = false">
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
        major:'',
        username:'',
        isUpdate:false,
        currentPassword:'',
        newPassword:'',
        confirmPassword:'',
        image:'',
        imagePreview:false,
      }
    },

    mounted(){
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
          vm.major = response.data.course[0].major;
          vm.username = response.data.student.idnum;
        });
      },

      userCurrentPassword(){
        var vm = this;
        if (this.currentPassword != '') {
          axios.post(`verify-current-password`,{
            'currentPassword' : this.currentPassword,
          }).then(function(response){
            if (response.data == true) {
              console.log(response);
              Materialize.toast('Password verified !',3000,'rounded light-blue lighten-1');
              $('#password').prop("disabled",false);
              $('#password_confirmation').prop("disabled",false);
              $('#updateBtn').removeClass("disabled");
              }else{
              console.log(response);
              $('#currentpassword').addClass("invalid").removeClass("valid");
              Materialize.toast('Invalid password !',3000,'rounded red lighten-1');
            }
          }).catch(function(error){
            Materialize.toast('Something went wrong !',3000,'rounded red lighten-1');
          });
        }else{
          Materialize.toast('Fields required !',3000,'rounded red lighten-1');
        }
      },

      userUpdate(){
        var vm = this;
        if (this.currentPassword == '' || this.newPassword == '' || this.confirmPassword == '') {
          Materialize.toast('Fields required !',3000,'rounded red lighten-1');
        }else {
          if (this.newPassword == this.confirmPassword) {
            axios.put(`student-user-update`,{
                'newPassword' : this.newPassword,
                'confirmPassword' : this.confirmPassword
            }).then(function(response){
              vm.currentPassword = '';
              $('#password').prop("disabled",true);
              $('#password_confirmation').prop("disabled",true);
              $('#updateBtn').addClass("disabled");
              Materialize.toast('Successfully updated !',3000,'rounded light-blue lighten-1');
            });
          }else {
            vm.newPassword = '';
            vm.confirmPassword = '';
            $('#password').addClass("invalid").removeClass("valid");
            $('#password_confirmation').addClass("invalid").removeClass("valid");
            Materialize.toast('Password dont match !',3000,'rounded red lighten-1');
          }
        }
      },

      updateAvatar(){
        var vm = this;
        axios.post(`update-avatar`,{
          'image' : this.image
        }).then(function(response){
          console.log(response);
          Materialize.toast('Avatar uploaded !',3000,'rounded light-blue lighten-1');
          location.reload();
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
