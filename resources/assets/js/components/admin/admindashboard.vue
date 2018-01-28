<template lang="html">
  <div class="content-container">
    <div class="dashboard-content-up">
      <div class="number">
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
      </div>
    </div>
    <div class="dashboard-content-down z-depth-2">
      <div class="school-calendar z-depth-1">
        <h5>School Year Calendar</h5>
        <a href="#calendar" class="btn-floating btn-small waves-effect waves-light  light-blue darken-3 right modal-trigger"><i class="material-icons">add</i></a>
      </div>
      <vue-event-calendar :events="demoEvents"></vue-event-calendar>

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
        dataCount : true,
        title:'',
        date:'',
        description:'',


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
          console.log(response);
        });
      },

      addEvent(){
          var vm = this;
          axios.post(`add-event`,{
            'title' : this.title,
            'description' : this.description,
            'date' : $('#date-event').val()
          }).then(function(response){
            console.log(response);
          }).catch(function(error){
            console.log(error);
          });
      }
    }
  }


</script>
