<template lang="html">
  <div class="content-container">
    <div class="content-header z-depth-2">
      <label>Students</label>
      <input type="text" name="search" value="" v-model="search" v-on:keyup.enter="showStudents(1)" placeholder="Search Student">
      <i class="material-icons">search</i>
    </div>
    <div class="departmentOption"></div>
    <div class="student-list z-depth-2">
      <div class="select-container">
        <div class="input-field">
          <select>
            <option value="" disabled selected> Department</option>
            <option value="1">CBA</option>
            <option value="2">CCICT</option>
            <option value="3">CRIM</option>
            <option value="3">CON</option>
            <option value="3">COE</option>
            <option value="3">HRM</option>
          </select>
          <label>By Department</label>
        </div>
        <div class="input-field">
          <select>
            <option value="" disabled selected> Year</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
          <label>By Year</label>
        </div>
      </div>

      <table class="striped">
        <thead>
          <tr>
            <th>Student ID</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>MI</th>
            <th>Course</th>
            <th>Year</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for = "stud in student">
            <td>{{stud.idnum}}</td>
            <td>{{stud.lname}}</td>
            <td>{{stud.fname}}</td>
            <td>{{stud.mi}}</td>
            <td v-if = "stud.studentcourse[0] != null">{{stud.studentcourse[stud.studentcourse.length - 1].cr_acrnm}}</td>
            <td v-if = "stud.studentcourse[0] != null">{{stud.studentcourse[stud.studentcourse.length - 1].pivot.year}}</td>
            <td id="actions">
              <a href="#viewStudent" class="modal-trigger" v-on:click="fetchUpdate(stud.idnum),isUpdate = true" ><i class="material-icons">remove_red_eye</i></a>
              <a href="#updateStudent" class="modal-trigger" v-on:click="fetchUpdate(stud.idnum),isUpdate = true" ><i class="material-icons" style="color:#fb8c00;">edit</i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div id="viewStudent" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="modal-header light-blue darken-1">
          <h5>Student Information</h5>
        </div>
        <div class="modal-fields" >
          <div class="input-field" >
            <input id="idnum" disabled name="idnum" v-model="idnum" type="text" class="validate" >
            <label for="idnum" :class="[isUpdate == true ? 'active' : ' ']">ID Number</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="Firstname " disabled name="Firstname" v-model="fname" type="text" class="validate">
            <label for="Firstname" :class="[isUpdate == true ? 'active' : ' ']">Firstname</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="Lastname" disabled name="Lastname" v-model="lname " type="text" class="validate">
            <label for="Lastname" :class="[isUpdate == true ? 'active' : ' ']">Lastname</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="mi" disabled name="mi" v-model="mi " type="text" class="validate">
            <label for="mi" :class="[isUpdate == true ? 'active' : ' ']">Middle Initial</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="addB" disabled name="addB"  v-model="addb "type="text" class="validate">
            <label for="addB" :class="[isUpdate == true ? 'active' : ' ']">Address Baranggay</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="addT" disabled name="addT" v-model="addt" type="text" class="validate">
            <label for="addT" :class="[isUpdate == true ? 'active' : ' ']">Adress Town</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="AddressP" disabled name="AddressP" v-model="addp" type="text" class="validate">
            <label for="AddressP" :class="[isUpdate == true ? 'active' : ' ']">Address Province</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="gender" disabled name="gender" v-model="gender" type="text" class="validate">
            <label for="gender" :class="[isUpdate == true ? 'active' : ' ']">Gender</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="birthday" disabled name="birthday" v-model="bdate" type="text" class="validate">
            <label for="birthday" :class="[isUpdate == true ? 'active' : ' ']">Birthday</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="Status" disabled name="Status" v-model="status" type="text" class="validate">
            <label for="Status" :class="[isUpdate == true ? 'active' : ' ']">Status</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="father" disabled name="father" v-model="father" type="text" class="validate">
            <label for="father" :class="[isUpdate == true ? 'active' : ' ']">Father</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="mother" disabled name="mother"v-model="mother" type="text" class="validate">
            <label for="mother" :class="[isUpdate == true ? 'active' : ' ']">Mother</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a id="close" class="waves-effect waves-light modal-close light-blue lighten-3 btn-flat"style="color:#ffffff;"><i class="material-icons">close</i></a>
      </div>
    </div>

    <div id="updateStudent" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="modal-header light-blue darken-1">
          <h5>Update Student Information</h5>
        </div>
        <div class="modal-fields" >
          <div class="input-field" >
            <input id="idnum" disabled name="idnum" v-model="idnum= fetchDataUpdate.idnum " type="text" class="validate" >
            <label for="idnum" :class="[isUpdate == true ? 'active' : ' ']">ID Number</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="Firstname " name="Firstname" v-model="fname= fetchDataUpdate.fname " type="text" class="validate">
            <label for="Firstname" :class="[isUpdate == true ? 'active' : ' ']">Firstname</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="Lastname" name="Lastname" v-model="lname= fetchDataUpdate.lname " type="text" class="validate">
            <label for="Lastname" :class="[isUpdate == true ? 'active' : ' ']">Lastname</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="mi" name="mi" v-model="mi= fetchDataUpdate.mi " type="text" class="validate">
            <label for="mi" :class="[isUpdate == true ? 'active' : ' ']">Middle Initial</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="addB" name="addB"  v-model="addb= fetchDataUpdate.addb "type="text" class="validate">
            <label for="addB" :class="[isUpdate == true ? 'active' : ' ']">Address Baranggay</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="addT" name="addT" v-model="addt= fetchDataUpdate.addt " type="text" class="validate">
            <label for="addT" :class="[isUpdate == true ? 'active' : ' ']">Adress Town</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="AddressP" name="AddressP" v-model="addp= fetchDataUpdate.addp " type="text" class="validate">
            <label for="AddressP" :class="[isUpdate == true ? 'active' : ' ']">Address Province</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="gender" name="gender" v-model="gender= fetchDataUpdate.gender " type="text" class="validate">
            <label for="gender" :class="[isUpdate == true ? 'active' : ' ']">Gender</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="birthday" name="birthday" v-model="bdate= fetchDataUpdate.bdate " type="text" class="validate">
            <label for="birthday" :class="[isUpdate == true ? 'active' : ' ']">Birthday</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="Status" name="Status" v-model="status= fetchDataUpdate.status " type="text" class="validate">
            <label for="Status" :class="[isUpdate == true ? 'active' : ' ']">Status</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="father" name="father" v-model="father= fetchDataUpdate.father " type="text" class="validate">
            <label for="father" :class="[isUpdate == true ? 'active' : ' ']">Father</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="mother" name="mother"v-model="mother= fetchDataUpdate.mother " type="text" class="validate">
            <label for="mother" :class="[isUpdate == true ? 'active' : ' ']">Mother</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a id="close" class="waves-effect waves-light modal-close light-blue lighten-3 btn-flat"style="color:#ffffff;"><i class="material-icons">close</i></a>
        <a id="edit" class="waves-effect waves-light modal-close amber lighten-3 btn-flat" v-on:click="updateStudent()" style="color:#ffffff;"><i class="material-icons">edit</i></a>
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
        student:[],
        fetchDataUpdate :[],
        isUpdate : false,
        oldIdnum :'',
        idnum : '',
        fname : '',
        lname:'',
        mi : '',
        addb:'',
        addt:'',
        addp:'',
        gender:'',
        bdate:'',
        status:'',
        father:'',
        mother:'',
        base_rate: '',
        search:''
    }
  },

  mounted(){
    this.showStudents()
  },


  methods:{
    showStudents(page){
      var vm = this;
      axios.get(`student-data?search=`+this.search+`&page=`+ page).then(function(response){
        vm.student = response.data.student.data;
        vm.pagination = response.data.student;
      });
    },

    fetchUpdate(idnum){
      var vm = this;
      axios.get(`fetch-student/` + idnum).then(function(response){
        vm.oldIdnum = response.data[0].idnum;
        vm.fetchDataUpdate = response.data[0];
        console.log(response);
      });
    },

    updateStudent(){
      var vm = this;
      axios.put(`update-student/` + this.oldIdnum,{
        'idnum' :this.idnum,
        'lname' : this.lname,
        'fname' :this.fname,
        'mi' : this.mi,
        'addb' : this.addb,
        'addt' : this.addt,
        'addp' : this.addp,
        'gender' : this.gender,
        'status' : this.status,
        'bdate' : this.bdate,
        'mother' : this.mother,
        'father' : this.father,
        'base_rate' : this.fetchDataUpdate.base_rate

      }).then(function(response){
        Materialize.toast('Updated !',3000,'rounded');
        vm.showStudents();
        console.log(response);
      }).catch(function(error){
        Materialize.toast('Something went wrong !' , 3000, 'rounded');
        console.log(error);
      });
    },

    changepage(next){
     this.pagination.current_page = next;
     this.showStudents(next);
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
