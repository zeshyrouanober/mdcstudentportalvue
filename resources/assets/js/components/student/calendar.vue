<template lang="html">
  <div class="calendar-container z-depth-1">
    <div class="school-calendar blue darken-3">
      <label class="white-text" >School Year Calendar</label>
    </div>
    <br>
    <div class="vue-event-calendar-container">
      <vue-event-calendar :events="eventsCalendar"  @day-changed="handleDayChanged" @month-changed="handleMonthChanged">
        <a href="#" @click.prevent="showAllEvents()" class="tooltipped" data-position="top" data-delay="20" data-tooltip="All Events" ><i class="material-icons white-text small">event_note</i></a>
        <div class="event-viewer " v-for="events in eventsCalendar">
            <div class="event-container white" >
                <div class="event-title-date">
                  <label class="eventitle blue-grey-text">{{events.title}}</label>
                  <label class="eventdate">{{events.date}}</label>
                </div>
                <div class="event-description">
                  <label class="eventdesc">{{events.desc}}</label>
                  <a href="#eventview" class="modal-trigger" v-on:click="viewEvent(events.id), isView = true" ><i class="material-icons">remove_red_eye</i></a>
                </div>
            </div>
        </div>
        <div class="one-event-viewer">
            <div class="event-container white" >
                <div class="event-title-date">
                  <label class="eventitle blue-grey-text">{{oneEventViewer.title}}</label>
                  <label class="eventdate">{{oneEventViewer.date}}</label>
                </div>
                <div class="event-description">
                  <label class="eventdesc">{{oneEventViewer.desc}}</label>
                  <a href="#eventview" class="modal-trigger" v-on:click="viewEvent(oneEventViewer.id),isView = true" ><i class="material-icons">remove_red_eye</i></a>
                </div>
            </div>
        </div>
      </vue-event-calendar>
    </div>
    <!-- Event view modal -->
    <div id="eventview" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="modal-header light-blue darken-1">
          <h4 id="event-header" >Event details</h4>
        </div>
        <div class="modal-fields">
          <div class="input-field">
            <i class="material-icons prefix">Date</i>
            <input id="event-date"  type="text" required v-model="eventView.date" disabled>
            <label for="event-date" :class="[isView == true ? 'active' : '']" id="label-date">Date</label>
          </div>
          <div class="input-field">
            <i class="material-icons prefix">title</i>
            <input id="event-title"  type="text" v-model="eventView.title" required disabled>
            <label for="event-title" :class="[isView == true ? 'active' : '']" id="label-title">Title</label>
          </div>
          <div class="input-field">
            <i class="material-icons prefix">description</i>
            <input id="event-description" type="text" v-model="eventView.desc" required  disabled >
            <label for="event-description" :class="[isView == true ? 'active' : '']" id="label-desc" >Description</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a id= "close" class="modal-action modal-close waves-effect waves-light light-blue lighten-2 btn-flat" style="color:#ffffff;"><i class="material-icons">close</i></a>
      </div>
    </div>
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
      eventView:[],
      isView : false,
      oneEventViewer:[],
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
      });
    },

    viewEvent(id){
      var vm = this;
      axios.get(`view-event/` + id).then(function(response){
        vm.eventView = response.data[0];
      });
    },

    showAllEvents(){
      $(".one-event-viewer").css("display","none");
      $(".event-viewer").css("display","flex");
      $(".date").html("All Events");

    },

    handleDayChanged (data) {
      $(".event-viewer").css("display","none");
      $(".one-event-viewer").css("display","flex");

      var vm = this;
      vm.oneEventViewer = data.events[0];

      $(".date").html(vm.oneEventViewer.date);
    },

    handleMonthChanged (data) {
      console.log(data);
    }

  }
}
</script>
