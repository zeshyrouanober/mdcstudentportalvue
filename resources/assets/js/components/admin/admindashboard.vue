<template lang="html">
  <div class="content-container">
    <div class="dashboard-content-up">
      <div class="number">
        <div class="counter-container z-depth-1 teal">
          <div class="title z-depth-1 ">
            <div class="title-content">
              <label>Users</label>
            </div>
            <div class="space"><a><i class="material-icons user">remove_red_eye</i></a></div>
          </div>
          <div class="icon">
              <div class="icon-content">
                <i class="material-icons">account_circle</i>
              </div>
          </div>
          <div class="counter">
            <div class="counter-content">
              <h3 class="counters"  data-count="100">0</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="number">
        <div class="counter-container z-depth-1 amber">
          <div class="title z-depth-1 ">
            <div class="title-content">
              <label>Subjects</label>
            </div>
            <div class="space"><a ><i class="material-icons subject">remove_red_eye</i></a></div>
          </div>
          <div class="icon">
              <div class="icon-content">
                <i class="material-icons">subject</i>
              </div>
          </div>
          <div class="counter">
            <div class="counter-content">
              <h3 class="counters" data-count="120">0</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="number">
        <div class="counter-container z-depth-1 purple ">
          <div class="title z-depth-1">
            <div class="title-content ">
              <label>Students</label>
            </div>
            <div class="space"><a><i class="material-icons student">remove_red_eye</i></a></div>
          </div>
          <div class="icon">
              <div class="icon-content">
                <i class="material-icons">people</i>
              </div>
          </div>
          <div class="counter">
            <div class="counter-content">
              <h3 class="counters" data-count="250">0</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="dashboard-content-down z-depth-1">
      <div class="school-calendar z-depth-1">
        <h5>School Year Calendar</h5>
        <a class="btn-floating btn-large waves-effect waves-light  light-blue darken-3 right"><i class="material-icons">add</i></a>
      </div>
      <vue-event-calendar :events="demoEvents"></vue-event-calendar>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  import 'vue-event-calendar/dist/style.css'
  import vueEventCalendar from 'vue-event-calendar'
  Vue.use(vueEventCalendar, {locale: 'en',color: 'rgb(21, 101, 192)'})

  export default {
    data(){
      return{
        userCounter : '',
        dataCount : true,
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

    mounted(){
      this.userCounters()
    },

    methods:{
      userCounters(){
        var vm = this;
        axios.get(`user-counters`).then(function(response){
          vm.userCounter = response.data;
          console.log(vm.userCounter);
        });
      }
    }
  }

</script>
