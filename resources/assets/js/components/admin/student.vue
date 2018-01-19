<template lang="html">
  <div class="content-container">
    <div class="content-header z-depth-1">
      <label>Students</label>
      <input type="text" name="search" value="" placeholder="Search Student">
      <a href="#"><i class="material-icons">search</i></a>
    </div>
    <div class="departmentOption"></div>
    <div class="student-list z-depth-1">
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

      <table class="bordered highlight">
        <thead>
          <tr>
            <th>Student ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>MI</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for = "stud in student">
            <td>{{stud.idnum}}</td>
            <td>{{stud.fname}}</td>
            <td>{{stud.lname}}</td>
            <td>{{stud.mi}}</td>
            <td id="actions">
              <a href="#" class="modal-trigger" ><i class="material-icons">remove_red_eye</i></a>
              <a href="#" class="modal-trigger"><i class="material-icons" style="color:#fb8c00;">edit</i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- <div class="pagination-container">
      <ul class="pagination">
        <li class="waves-effect waves-light" v-if="pagination.current_page > 1"><a href="#" @click.prevent="changepage(pagination.current_page - 1)"><i class="material-icons">chevron_left</i></a></li>
        <li class="waves-effect waves-light"  v-for="page in pagesNumber" v-bind:class="[ page == isActive ? 'active blue':'']"><a href="#" @click.prevent="changepage(page)">{{page}}</a></li>
        <li class="waves-effect waves-light" v-if="pagination.current_page < pagination.last_page"><a href="#" @click.prevent="changepage(pagination.current_page + 1)"><i class="material-icons">chevron_right</i></a></li>
      </ul>
    </div> -->
  </div>
</template>

<script>

import axios from 'axios';

export default {
  mounted(){
    this.showStudents()
  },

  data(){
    return{
        pagination:[],
        offset:4,
        student:[]
    }
  },

  methods:{
    showStudents(page){
      var vm = this;
      axios.get(`student-data?page=` + page).then(function(response){
        vm.student = response.data.student.data;
        vm.pagination = response.data.students;
        console.log(response);
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
