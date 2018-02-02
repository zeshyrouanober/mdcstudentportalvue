<template lang="html">
    <div class="content-container">
      <div class="content-header  z-depth-2">
        <label>Accounts</label>
        <input type="text" name="search" v-model="search" v-on:keyup.enter="showAccounts(1)" value="" placeholder="Search Account">
        <i class="material-icons">search</i>
      </div>
      <div class="accounts-content z-depth-2">
        <table class="striped">
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
                  <a href="#userinfo" class="modal-trigger" v-on:click="userInformation(u.username),isUpdate = true"><i class="material-icons" style="color:#01579b">account_circle</i></a>
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
               <input type="checkbox" id="checkbox-account" v-on:click="isChecked = true"/>
               <label for="checkbox-account" v-on:click="isChecked = true" >I review and remember</label>
             </p>
            </div>
          </div>
          <div class="modal-footer">
            <a id="close" class="waves-effect waves-light modal-close light-blue  btn-flat " v-on:click="cleanFields()" style="color:#ffffff;"><i class="material-icons">close</i></a>
            <a id="edit" class="waves-effect waves-light modal-close amber  btn-flat " :class="[isChecked == true ? 'pulse' : 'disabled']"  v-on:click="updateUser()" style="color:#ffffff;"><i class="material-icons">edit</i></a>
          </div>
       </div>
      <div id="userinfo" class="modal modal-fixed-footer">
          <div class="modal-content">
            <div class="modal-header light-blue darken-1">
              <h5>User Basic Details</h5>
            </div>
            <div class="modal-fields" >
              <div class="input-field" >
                <input id="student-idnum"  disabled v-model="idnum" name="student-idnum" type="text" class="validate" >
                <label for="student-idnum" :class="[isUpdate == true ? 'active' : ' ']" >Id Number</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="student-lname" disabled v-model="lname" name="student-lname" type="text" class="validate">
                <label for="student-lname" :class="[isUpdate == true ? 'active' : '']"  >Lastname</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="student-fname" disabled v-model="fname" name="student-fname" type="text" class="validate">
                <label for="student-fname" :class="[isUpdate == true ? 'active' : '']"  >Firstname</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="student-mi" disabled v-model="mi" name="student-mi" type="text" class="validate">
                <label for="student-mi" :class="[isUpdate == true ? 'active' : '']" >Middle Initial</label>
              </div>
              <div class="input-field" disabled id="acccount-label-active" >
                <input id="gender" v-model="gender" name="gender" type="text" class="validate">
                <label for="gender" :class="[isUpdate == true ? 'active' : '']" >Gender</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="course"  disabled v-model="course" name="course" type="text" class="validate">
                <label for="course" :class="[isUpdate == true ? 'active' : '']"  >Course</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="year" disabled v-model="year" name="year" type="text" class="validate">
                <label for="year" :class="[isUpdate == true ? 'active' : '']" >Year</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="addb" disabled v-model="addb " name="addb" type="text" class="validate">
                <label for="addb" :class="[isUpdate == true ? 'active' : '']" >Baranggay</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="addt" disabled v-model="addt " name="addt" type="text" class="validate">
                <label for="addt" :class="[isUpdate == true ? 'active' : '']" >Town</label>
              </div>
              <div class="input-field" id="acccount-label-active" >
                <input id="addp" disabled v-model="addp " name="addp" type="text" class="validate">
                <label for="addp" :class="[isUpdate == true ? 'active' : '']" >Province</label>
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
        search:'',
        idnum:'',
        lname:'',
        fname:'',
        addb:'',
        addt:'',
        addp:'',
        gender:'',
        course:'',
        mi:'',
        year:''
      }
    },

    mounted(){
      this.showAccounts()
    },

    methods:{
      showAccounts(page){
        var vm = this;
        axios.get(`user-data?search=`+this.search+`&page=` + page).then(function(response){
          vm.user = response.data.user.data;
          vm.pagination = response.data.user;
        });
      },

      fetchUserData(username){
        var vm = this;
        axios.get('user-student-data/' + username).then(function(response){
          vm.fetchUser = response.data[0];
        });
      },

      updateUser(){
        var vm = this;
        axios.put(`update-user/` + this.fetchUser.username,{
          'username' : this.fetchUser.username,
          'password' : this.password,
          'passwordconfirmation' : this.passwordconfirmation
        }).then(function(response){
          Materialize.toast('User Updated !',3000,'rounded light-blue lighten-1');
          vm.showAccounts();
        }).catch(function(error){
          Materialize.toast('Opps something went wrong !',3000,'rounded red lighten-1');
          console.log(error);
        });
      },

      userInformation(username){
        var vm = this;
        axios.get(`user-information/` + username).then(function(response){
          vm.idnum = response.data.student.idnum;
          vm.fname = response.data.student.fname;
          vm.lname = response.data.student.lname;
          vm.mi = response.data.student.mi;
          vm.addb = response.data.student.addb;
          vm.addt = response.data.student.addt;
          vm.addp = response.data.student.addp;
          vm.gender = response.data.student.gender;
          vm.course = response.data.course[0].course;
          vm.year = response.data.course[0].pivot.year;

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
