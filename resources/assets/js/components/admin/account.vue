<template lang="html">
    <div class="accounts-container">
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
                  <a href="#user" class="modal-trigger" ><i class="material-icons">remove_red_eye</i></a>
                  <a href="#user" class="modal-trigger"><i class="material-icons" style="color:#fb8c00;">edit</i></a>
                  <a href="#userinfo" class="modal-trigger" v-on:click="fetchStudentData(u.username)"><i class="material-icons" style="color:#01579b">account_circle</i></a>
                </td>
              </tr>
          </tbody>
        </table>
        <div id="user" class="modal modal-fixed-footer">
          <div class="modal-content">
            <div class="modal-header light-blue darken-1">
              <h5>View Account</h5>
            </div>
            <div class="modal-fields" >
              <div class="input-field" >
                <input id="student-idnum" v-model="fetchStudent.username" name="student-idnum"type="text" class="validate" >
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
            </div>
          </div>
          <div class="modal-footer">
            <a id="close" class="waves-effect waves-light modal-close light-blue lighten-3 btn-flat" style="color:#ffffff;"><i class="material-icons">close</i></a>
            <a id="edit" class="waves-effect waves-light modal-close amber lighten-3 btn-flat" style="color:#ffffff;"><i class="material-icons">edit</i></a>
          </div>
       </div>
      <div id="userinfo" class="modal modal-fixed-footer">
          <div class="modal-content">
            <div class="modal-header light-blue darken-1">
              <h5>User Basic Details</h5>
            </div>
            <div class="modal-fields" >
              <div class="input-field" >
                <input id="student-idnum" v-model="fetchStudent.username" name="student-idnum"type="text" class="validate" >
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
                <input id="student-course" name="student-course" type="text" class="validate">
                <label for="student-course" >Course</label>
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
        fetchStudent:[]
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

      fetchStudentData(username){
        var vm = this;
        axios.get('user-student-data/' + username).then(function(response){
          vm.fetchStudent = response.data.user.data;
          console.log(response);
        });
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
