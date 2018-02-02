<template lang="html">
  <div class="content-container">
    <div class="content-header z-depth-2">
      <label>Subjects</label>
      <input type="text" name="search" value="" v-model="search" v-on:keyup="showSubjects(1)" placeholder="Search Subject">
      <i class="material-icons">search</i>
    </div>
    <div class="departmentOption"></div>
    <div class="student-list z-depth-2">
      <table class="striped">
        <thead>
          <tr>
            <th>Subject Code</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="s in subject">
            <td>{{s.sub_code}}</td>
            <td>{{s.name}}</td>
            <td>{{s.descript}}</td>
            <td>
              <a href="#subjectmodal" class="modal-trigger" v-on:click = "fetchUpdate(s.sub_code),isUpdate = true"><i class="material-icons">remove_red_eye</i></a>
              <a href="#updateSubjectModal" class="modal-trigger" v-on:click = "fetchUpdate(s.sub_code),isUpdate = true"><i class="material-icons" style="color:#fb8c00;">edit</i></a>
              <a href="#showSubjectStudent" class="modal-trigger" v-on:click = "listOfStudent(s.sub_code,s.descript)"><i class="material-icons" style="color:#009688;">people</i></a>
            </td>
          </tr>
        </tbody>
      </table>
  </div>
    <div id="subjectmodal" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="modal-header light-blue darken-1">
          <h5>Subject Details</h5>
        </div>
        <div class="modal-fields" >
          <div class="input-field" >
            <input id="subject-code" disabled v-model="updateCode" name="subject-code"type="text" class="validate" >
            <label for="subject-code" :class="[isUpdate == true ? 'active' : ' ']">Subject Code</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="subject-name" disabled v-model="updateName"name="subject-name" type="text" class="validate">
            <label for="subject-name" :class="[isUpdate == true ? 'active' : ' ']">Name</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="subject-description" disabled v-model="updateDescription" name="subject-description" type="text" class="validate">
            <label for="subject-description" :class="[isUpdate == true ? 'active' : ' ']" >Description</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a id="close" class="waves-effect waves-light modal-close light-blue lighten-3 btn-flat" style="color:#ffffff;"><i class="material-icons">close</i></a>
      </div>
    </div>

    <div id="updateSubjectModal" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="modal-header light-blue darken-1">
          <h5>Edit Subject Details</h5>
        </div>
        <div class="modal-fields" >
          <div class="input-field" >
            <input id="subject-code" v-model="updateCode = fetchDataUpdate.sub_code" name="subject-code"type="text" class="validate" >
            <label for="subject-code" :class="[isUpdate == true ? 'active' : ' ']">Subject Code</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="subject-name"  v-model="updateName = fetchDataUpdate.name" name="subject-name" type="text" class="validate">
            <label for="subject-name" :class="[isUpdate == true ? 'active' : ' ']">Name</label>
          </div>
          <div class="input-field" id="acccount-label-active" >
            <input id="subject-description" v-model="updateDescription = fetchDataUpdate.descript" name="subject-description" type="text" class="validate">
            <label for="subject-description" :class="[isUpdate == true ? 'active' : ' ']">Description</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a id="edit" class="waves-effect waves-light modal-close amber lighten-3 btn-flat" v-on:click="updateSubject()"style="color:#ffffff;"><i class="material-icons">edit</i></a>
      </div>
    </div>

    <div id="showSubjectStudent" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="modal-header light-blue darken-1">
          <h5>{{selectedSubject}}</h5>
        </div>
        <div class="modal-fields" >
          <table class="striped">
            <thead>
              <tr class="white">
                <th class=" blue-text text-lighten-1">ID Number</th>
                <th class=" blue-text text-lighten-1">Firstname</th>
                <th class=" blue-text text-lighten-1">Lastname</th>
                <th class=" blue-text text-lighten-1">Middle Initial</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="stud in students">
                <td>{{stud.idnum}}</td>
                <td>{{stud.fname}}</td>
                <td>{{stud.lname}}</td>
                <td>{{stud.mi}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <a id="close" class="waves-effect waves-light modal-close light-blue lighten-3 btn-flat" style="color:#ffffff;"><i class="material-icons">close</i></a>
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

<script type="text/javascript">
  import axios from 'axios';
      export default {

        data(){
          return{
            pagination:[],
            studentPagination:[],
            offset:4,
            subject:[],
            isUpdate:false,
            oldCode:'',
            updateCode:'',
            updateName:'',
            fetchDataUpdate:[],
            updateDescription:'',
            students:[],
            selectedSubject:'',
            headerTitle:false,
            search:''

          }
        },
        mounted(){
            this.showSubjects()
        },

        methods:{
          showSubjects(page){
            var vm = this;
            axios.get(`subject-data?search=`+this.search+`&page=` + page).then(function(response){
              vm.subject = response.data.subject.data;
              vm.pagination = response.data.subject;
            });
          },

          changepage(next){
           this.pagination.current_page = next;
           this.showSubjects(next);
         },

         fetchUpdate(subjectCode){
           var vm = this;
           axios.get(`fetch-subject-update/` + subjectCode).then(function(response){
              vm.oldCode = response.data[0].sub_code;
              vm.fetchDataUpdate = response.data[0];
              console.log(response);
           });
         },

         updateSubject(){
           var vm = this;
           axios.put(`update-subject/` + this.oldCode,{
              'sub_code' : this.updateCode,
              'name' : this.updateName,
              'descript' : this.updateDescription
           }).then(function(response){
             Materialize.toast('Subject Updated !',3000,'rounded light-blue lighten-1');
             vm.showSubjects();
           }).catch(function(error){
             Materialize.toast('Subject Deleted !',3000,'rounded red lighten-1');
             vm.showSubjects();
             console.log(error);
           });
         },

         listOfStudent(subjectCode,descript){
           var vm = this;
           axios.get(`list-of-student/` + subjectCode ).then(function(response){
              vm.students = response.data.data;
              vm.selectedSubject = descript;
              vm.studentPagination = response.data;
              console.log(response);
           });
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
