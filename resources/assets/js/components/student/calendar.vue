<template lang="html">
  <div class="calendar-container z-depth-2">
    <div class="school-calendar z-depth-1">
      <h5>School Year Calendar</h5>
    </div>
    <vue-event-calendar :events="demoEvents"></vue-event-calendar>

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

      events:[{
        date:'',
        title:'',
        description:''
      }],

      demoEvents: [{
        date: '2018/01/12', // Required
        title: 'Foo' // Required
      }, {
        date: '2018/01/15',
        title: 'Bar',
        desc: 'description',
      }]
    }
  },

  methods:{

    addEvent(){
      var vm = this;
      axios.post(`add-event`).then(function(response){
        console.log(response);
      }).catch(function(error){
        console.log(error);
      });
    }

  }

}
</script>
