<template lang="html">
  <div class="content-container">
    <div class="dashboard-content-up">
      <div class="my-widget ">
        <div class="widget-container z-depth-1">
          <div class="widget-icon teal">
            <i class="material-icons white-text">account_circle</i>
          </div>
          <div class="widget-content">
            <div class="widget-title ">
              <label class="teal-text">Users</label>
            </div>
            <div class="widget-data ">
              <label class="teal-text">{{userCounter}}</label>
            </div>
          </div>
        </div>
      </div>
      <div class="my-widget ">
        <div class="widget-container z-depth-1">
          <div class="widget-icon indigo">
            <i class="material-icons white-text">subject</i>
          </div>
          <div class="widget-content">
            <div class="widget-title ">
              <label class="indigo-text">Subjects</label>
            </div>
            <div class="widget-data ">
              <label class="indigo-text">{{subjectCounter}}</label>
            </div>
          </div>
        </div>
      </div>
      <div class="my-widget ">
        <div class="widget-container z-depth-1">
          <div class="widget-icon amber">
            <i class="material-icons white-text">people</i>
          </div>
          <div class="widget-content">
            <div class="widget-title ">
              <label class="amber-text">Students</label>
            </div>
            <div class="widget-data ">
              <label class="amber-text">{{studentCounter}}</label>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="number">
        <div class="counter-container z-depth-2 teal">
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
              <h3 class="counters" data-count="120">0</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="number">
        <div class="counter-container z-depth-2 amber">
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
              <h3 class="counters" data-count="120" >0</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="number">
        <div class="counter-container z-depth-2 purple ">
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
      </div> -->
    </div>
    <div class="dashboard-content-down z-depth-2">
      <div class="school-calendar z-depth-1">
        <h5>School Year Calendar</h5>
        <a href="#calendar" class="btn-floating btn-small waves-effect waves-light  light-blue darken-3 right modal-trigger"><i class="material-icons">add</i></a>
      </div>
      <vue-event-calendar :events="demoEvents"  ></vue-event-calendar>

      <div id="calendar" class="modal modal-fixed-footer">
        <div class="modal-content">
          <div class="modal-header light-blue ">
            <h4 id="todos-header ">Add an Event</h4>
          </div>
          <div class="modal-fields">
            <div class="input-field">
              <i class="material-icons prefix">title</i>
              <input id="event-title" v-model="title" type="text" required class="validate" >
              <label for="event-title" id="label-title">Title</label>
            </div>
            <div class="input-field">
              <i class="material-icons prefix" >description</i>
              <textarea id="event-description" v-model="description" required class="materialize-textarea validate"></textarea>
              <label for="event-description"  id="label-desc" >Description</label>
            </div>
            <div class="input-field">
              <i class="material-icons prefix" >description</i>
              <input id="date-event" type="text" v-model="date" class="datepicker">
              <label for="date-event"  id="label-desc" >Date</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a id="cancel" class="btn btn-flat waves-effect waves-light white modal-close">Cancel</a>
          <a class="btn waves-effect waves-light modal-close light-blue" v-on:click="addEvent()">Add</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  import 'vue-event-calendar/dist/style.css';
  import vueEventCalendar from 'vue-event-calendar';
  Vue.use(vueEventCalendar, {locale: 'en',color: 'rgb(21, 101, 192)'});

  export default {
    data(){
      return{
        userCounter : '',
        subjectCounter : '',
        studentCounter : '',
        dataCount : true,
        title:'',
        date:'',
        description:'',
        events:[],

        demoEvents: [{
          date: '2018/01/12', // Required
          title: 'Foo' // Required
        }]
      }
    },

    mounted(){
      this.userCounters()
      this.subjectCounters()
      this.studentCounters()
      this.showEvents()
    },

    methods:{
      userCounters(){
        var vm = this;
        axios.get(`user-counters`).then(function(response){
          vm.userCounter = response.data;
          console.log(response);
        });
      },

      subjectCounters(){
        var vm = this;
        axios.get(`subject-counters`).then(function(response){
          vm.subjectCounter = response.data;
          console.log(response);
        });
      },

      studentCounters(){
        var vm = this;
        axios.get(`student-counters`).then(function(response){
          vm.studentCounter = response.data;
          console.log(response);
        });
      },

      addEvent(){
        var vm = this;
        axios.post(`create-event`,{
          'title' : this.title,
          'description' : this.description,
          'date' : $('#date-event').val()
        }).then(function(response){
          console.log(response);
        }).catch(function(error){
          console.log(error);
        });
      },

      showEvents(){
        var vm = this;
        axios.get(`show-events`).then(function(response){
          // vm.events = response.data.eventTitle;
          console.log(response);
        });
      }


      }

  }


</script>
