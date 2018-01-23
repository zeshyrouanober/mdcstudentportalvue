<template lang="html">
    <div class="content-container">
      <div class="content-header  z-depth-1">
        <label>Accounts</label>
        <input type="text" name="search" value="" placeholder="Search Account">
        <a href="#"><i class="material-icons">search</i></a>
      </div>
      <div class="accounts-content z-depth-1">
        <table class="bordered ">
          <thead>
            <tr>
              <th>Student Name</th>
              <th>Username</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <tr id="list-of-users" v-for="u in user">
                <td id="user-fullname">{{u.student.fname}} {{u.student.lname}}</td>
                <td id="user-username">{{u.username}}</td>
                <td id="user-password" type="password" >•••••••••••••••••••</td>
                <td id="actions">
                  <a href="#userEdit" class="modal-trigger" v-on:click="fetchUserData(u.username),isUpdate = true" ><i class="material-icons" style="color:#fb8c00;">edit</i></a>
                  <a href="#userinfo" class="modal-trigger" v-on:click="fetchUserData(u.username)"><i class="material-icons" style="color:#01579b">account_circle</i></a>
                </td>
              </tr>
          </tbody>
        </table>
        <div id="userEdit" class="modal modal-fixed-footer">
          <div class="modal-content">
            <div class="modal-header light-blue darken-1">
              <h5>Edit Account</h5>
            </div>
            <div class="modal-fields" >
              <div class="input-field" >
                <input id="student-idnum" disabled v-model="username = fetchUser.username" name="student-idnum"type="text" class="validate" >
                <label for="student-idnum" :class="[isUpdate == true ? 'active' : '']" >IDNumber</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="password" required v-model="password" name="password" type="text" class="validate">
                <label for="password" >New Password</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="passwordconfirmation" disabled  v-model="password" name="passwordconfirmation" type="text" class="validate">
                <label for="passwordconfirmation":class="[isUpdate == true ? 'active' : '']" >Confirmed Password</label>
              </div>
              <p>
               <input type="checkbox" id="test6" v-on:click="isChecked = true"/>
               <label for="test6" v-on:click="isChecked = true" >I review and remember</label>
             </p>
            </div>
          </div>
          <div class="modal-footer">
            <a id="close" class="waves-effect waves-light modal-close light-blue lighten-3 btn-flat " v-on:click="cleanFields()" style="color:#ffffff;"><i class="material-icons">close</i></a>
            <a id="edit" class="waves-effect waves-light modal-close amber lighten-3 btn-flat " :class="[isChecked == true ? 'pulse' : 'disabled']"  v-on:click="updateUser()" style="color:#ffffff;"><i class="material-icons">edit</i></a>
          </div>
       </div>
      <div id="userinfo" class="modal modal-fixed-footer">
          <div class="modal-content">
            <div class="modal-header light-blue darken-1">
              <h5>User Basic Details</h5>
            </div>
            <div class="modal-fields" >
              <div class="input-field" >
                <input id="student-idnum"  name="student-idnum"type="text" class="validate" >
                <label for="student-idnum">IDNumber</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="student-lname" name="student-lname" type="text" class="validate">
                <label for="student-lname" >Lastname</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="student-fname" name="student-fname" type="text" class="validate">
                <label for="student-fname" >Firstname</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="student-mi" name="student-mi" type="text" class="validate">
                <label for="student-mi" >Middle Initial</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="gender" name="gender" type="text" class="validate">
                <label for="gender" >Gender</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="student-add" name="student-add" type="text" class="validate">
                <label for="student-add" >Address</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a id="close" class="waves-effect waves-light modal-close light-blue lighten-2 btn-flat" style="color:#ffffff;"><i class="material-icons">close</i></a>
          </div>
        </div>
    </div>
    <div class="pagination-container">
      <ul class="pagination">
        <li class="waves-effect waves-light" v-if="pagination.current_page > 1"><a href="#" @click.prevent="changepage(pagination.current_page - 1)"><i class="material-icons">chevron_left</i></a></li>
        <li class="waves-effect waves-light"  v-for="page in pagesNumber" v-bind:class="[ page == isActive ? 'active blue':'']"><a href="#" @click.prevent="changepage(page)">{{page}}</a></li>
        <li class="waves-effect waves-light" v-if="pagination.current_page < pagination.last_page"><a href="#" @click.prevent="changepage(pagination.current_page + 1)"><i class="material-icons">chevron_right</i></a></li>
      </ul>
    </div>
  </div>
</template>

<script>

  import axios from 'axios';

  export default {


    data(){
      return{
        pagination:[],
        offset:4,
        user :[],
        fetchUser:[],
        isUpdate: false,
        isChecked : false,
        username:'',
        password:'',
        passwordconfirmation:'',
        idnum : '',
        fname : '',
        lname : '',
        mi : '',
        gender : '',
        address : '',
      }
    },

    mounted(){
      this.showAccounts()
    },

    methods:{
      showAccounts(page){
        var vm = this;
        axios.get(`user-data?page=` + page).then(function(response){
          vm.user = response.data.user.data;
          vm.pagination = response.data.user;
          console.log(response);
        });
      },

      fetchUserData(username){
        var vm = this;
        axios.get('user-student-data/' + username).then(function(response){
          vm.fetchUser = response.data[0];
          console.log(response);
        });
      },

      updateUser(){
        var vm = this;
        axios.put(`update-user/` + this.fetchUser.username,{
          'username' : this.fetchUser.username,
          'password' : this.password,
          'passwordconfirmation' : this.passwordconfirmation
        }).then(function(response){
          Materialize.toast('Updated !', 3000, 'rounded');
          vm.showAccounts();
          console.log(response);
        }).catch(function(error){
          Materialize.toast('Something went wrong !', 3000, 'rounded');
          console.log(error);
        });
      },

      cleanFields(){
        this.password = '';
        this.isChecked = false;
      },

      changepage(next){
       this.pagination.current_page = next;
       this.showAccounts(next);
     }
    },

    computed:{
       isActive:function(){
         return this.pagination.current_page;
       },
       pagesNumber:function(){
         if (!this.pagination.to) {
            return [];
         }
         var from = this.pagination.current_page - this.offset;
         if (from < 1) {
             from = 1;
         }
         var to = from + (this.offset * 2);
         if (to >= this.pagination.last_page) {
             to = this.pagination.last_page;
         }
         var pagesArray = [];
         while (from <= to) {
             pagesArray.push(from);
             from++;
         }
         return pagesArray;
       },
     },
  }
</script>
