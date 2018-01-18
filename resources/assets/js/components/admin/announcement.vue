<template lang="html">
  <div class="content-container" id="content-container">
    <div class="news-container">
      <div class="news-header z-depth-1">
        <label class="light-blue-text text-darken-1">Announcement</label>
        <a class="waves-effect waves-light btn light-blue darken-1 modal-trigger" v-on:click = "isUpdate = false, headerTitle = true" id="addnew" href="#announcement">Add New</a>
      </div>
    </div>
    <!--  Modal for the annnouncement  -->
      <div id="announcement" class="modal modal-fixed-footer">
        <div class="modal-content">
          <div class="modal-header light-blue darken-1">
            <h4 id="announcement-header" v-if="headerTitle == true" >Create Announcement</h4>
            <h4 id="announcement-header" v-else>Update Announcement</h4>
          </div>
          <div class="modal-fields">
            <div class="input-field">
              <i class="material-icons prefix">title</i>
              <input id="announcement-title" v-if = "isUpdate == false" v-model="title" type="text" required class="validate">
              <input id="announcement-title"  place-holder = "." v-else v-model="updatetitle = fetchupdate.title" type="text" required class="validate">
              <label for="announcement-title" :class="[isUpdate == true ? 'active' : '']" id="label-title">Title</label>
            </div>
            <div class="input-field">
              <i class="material-icons prefix">description</i>
              <textarea id="announcement-description" v-if = "isUpdate  == false"v-model ="description" required class="materialize-textarea validate"></textarea>
              <textarea id="announcement-description" v-else v-model ="updateDescription = fetchupdate.description" required class="materialize-textarea validate"></textarea>
              <label for="announcement-description" :class="[isUpdate == true ? 'active' : '']" id="label-desc" >Description</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a class="modal-action modal-close waves-effect waves-light btn  amber lighten-1 )"><i class="material-icons">close</i></a>
          <a class="modal-action modal-close waves-effect waves-light btn light-blue darken-1 " v-if = "headerTitle == true" onclick="Materialize.toast('Created !', 3000, 'rounded')" v-on:click="addAnnouncement()"><i class="material-icons">send</i></a>
          <a  class="modal-action modal-close waves-effect waves-light btn light-blue darken-1 " v-else onclick="Materialize.toast('Updated !', 3000, 'rounded') " v-on:click="updateAnnouncement()"><i class="material-icons">edit</i></a>
        </div>
      </div>
    <div class="announcement-content " id="announcement-content">
        <div class="card blue-grey lighten-1" v-for="announce in announcement">
          <div class="card-content white-text "  >
            <span class="card-title" id="view-title">{{announce.title}}</span>
            <p>{{announce.created_at}}</p><br>
            <p id="view-description">{{announce.description}}</p>
          </div>
          <div class="card-action">
            <a href="#announcement" class="modal-trigger" v-on:click = "fetchUpdate(announce.id),isUpdate = true , headerTitle = false" ><i class="material-icons">remove_red_eye</i></a>
            <a href="#announcement" class="modal-trigger" v-on:click = "fetchUpdate(announce.id),isUpdate = true , headerTitle = false" ><i class="material-icons">edit</i></a>
            <a href="#" v-on:click.prevent = "deleteAnnouncement(announce.id)" ><i class="material-icons">delete</i></a>
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
        return {
          title : '',
          description : '',
          announcement : [],
          pagination:[],
          offset:4,
          fetchupdate : [],
          isUpdate : false,
          updatetitle : '',
          updateDescription : '',
          headerTitle : false        }
      },
      mounted () {
        this.showAnnouncement()
      },
      methods:{
        addAnnouncement(){
          var vm = this;
          axios.post(`create-announcement`,{
              'title' : this.title,
              'description' : this.description
          }).then(function(response){
            console.log(response);
            vm.showAnnouncement();
          }).catch(function(error){
            console.log(error);
          });
        },

        changepage(next){
         this.pagination.current_page = next;
         this.showAnnouncement(next);
       },

        showAnnouncement(page){
          var vm = this;
          axios.get(`announcement-data?page=` + page).then(function(response){
            vm.announcement = response.data.announcement.data;
            vm.pagination = response.data.announcement;
            console.log(response);
          });
        },

        fetchUpdate(id){
          var vm = this;
          axios.get(`fetch-data-update/` + id ).then(function(response){
            vm.fetchupdate = response.data[0];
            console.log(response);
          });
        },

        updateAnnouncement(){
          var vm = this;
          axios.put(`update-announcement/` + this.fetchupdate.id ,{
            'title' : this.updatetitle,
            'description' : this.updateDescription
          }).then(function(response){
            vm.showAnnouncement();
          }).catch(function(error){
            console.log(error);
          });
        },

        deleteAnnouncement(id){
          if (confirm("Are you sure ?") ) {
            var vm = this;
            axios.delete(`delete-announcement/` + id ).then(function(response){
              vm.showAnnouncement();
            }).catch(function(error){
              console.log(error);
            });
          }
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
