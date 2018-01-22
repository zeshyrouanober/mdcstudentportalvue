<template lang="html">
  <div class="update-announcement-container">
    <div class="latest-update-header deep-purple darken-1">
      <h6>Latest Updates and Announcements</h6>
    </div>
    <div class="latest-update-content" v-for="announce in announcement">
      <div class="title">
        <h5>{{announce.title}}</h5>
        <h6>{{announce.created_at}}</h6>
      </div>
      <div class="description">
        <p>{{announce.description}}</p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data(){
    return{
      announcement:[],
      pagination:[],
    }
  },

  mounted(){
    this.showAnnouncements();
  },

  methods:{
    showAnnouncements(){
      var vm = this;
      axios.get(`show-announcement`).then(function(response){
        vm.announcement = response.data.announcement.data;
        vm.pagination = response.data;
        console.log(response);
      });
    }
  }


}
</script>
