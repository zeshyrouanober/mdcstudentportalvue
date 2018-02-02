<template lang="html">
  <div class="update-announcement-container">
    <div class="latest-update-header teal darken-1">
      <h6>Upcoming events</h6>
    </div>
    <div class="latest-update-content" v-for="ue in upcomingevents">
      <div class="title">
        <label class="announe-title">{{ue.title}}</label>
        <p class="blue-text text-darken-1">{{ue.date}}</p>
      </div>
      <div class="description">
        <label>{{ue.desc}}</label>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data(){
    return{
      upcomingevents:[],
      pagination:[],
    }
  },

  mounted(){
    this.showUpcomingEvents();
  },

  methods:{
    showUpcomingEvents(){
      var vm = this;
      axios.get(`show-upcomingevents`).then(function(response){
        vm.upcomingevents = response.data.upcomingevents.data;
        vm.pagination = response.data;
      });
    }
  }


}
</script>
