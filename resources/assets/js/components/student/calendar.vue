<template lang="html">
  <div class="calendar-container z-depth-2">
    <div class="school-calendar white darken-3 z-depth-1 ">
      <label class="blue-text">School Year Calendar</label>
    </div>
    <vue-event-calendar :events="eventsCalendar"></vue-event-calendar>

  </div>
</template>

<script>
import 'vue-event-calendar/dist/style.css'
import vueEventCalendar from 'vue-event-calendar'
Vue.use(vueEventCalendar, {locale: 'en',color: 'rgb(21, 101, 192)'})

import axios from 'axios';
export default {

  data(){
    return{
      eventsCalendar:[],

    }
  },

  mounted(){
    this.showEvents();
  },

  methods:{

    showEvents(){
      var vm = this;
      axios.get(`show-events`).then(function(response){
        vm.eventsCalendar = response.data;
        console.log(response);
      });
    }

  }

}
</script>
