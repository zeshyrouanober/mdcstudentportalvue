<template lang="html">
  <div class="content-container">
    <div class="dashboard-content-up">
      <div class="my-widget ">
        <div class="widget-container white z-depth-1">
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
        <div class="widget-container white z-depth-1">
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
        <div class="widget-container white z-depth-1">
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
      <div class="school-calendar white z-depth-1">
        <label> <i class="material-icons">today</i>  School Year Calendar</label>
        <a href="#calendar" class="btn-floating btn-large waves-effect waves-light  light-blue darken-3 right modal-trigger"><i class="material-icons">add</i></a>
      </div>
      <!-- Add event modal -->
      <div id="calendar" class="modal modal-fixed-footer">
        <div class="modal-content">
          <div class="modal-header light-blue ">
            <h4 id="todos-header ">Add Event</h4>
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
              <i class="material-icons prefix" >date_range</i>
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

      <vue-event-calendar :events="eventsCalendar"  @day-changed="handleDayChanged" @month-changed="handleMonthChanged">
          <a href="#" @click.prevent="showAllEvents()" class="tooltipped" data-position="top" data-delay="20" data-tooltip="All Events" ><i class="material-icons white-text small">event_note</i></a>
          <div class="event-viewer " v-for="events in eventsCalendar">
              <div class="event-container white" >
                  <div class="event-title-date">
                    <label class="eventitle blue-grey-text">{{events.title}}</label>
                    <label class="eventdate">{{events.date}}</label>
                  </div>
                  <div class="event-description">
                    <label class="eventdesc grey-text">{{events.desc}}</label>
                    <div class="event-action">
                      <a href="#eventview" class="modal-trigger" v-on:click="fetchEventData(events.id), isView = true" ><i class="material-icons">remove_red_eye</i></a>
                      <a href="#eventupdate" class="modal-trigger" v-on:click="fetchEventData(events.id), isView = true" ><i class="material-icons teal-text ">edit</i></a>
                      <a href="#" @click.prevent="deleteEvent(events.id)" ><i class="material-icons deep-orange-text">delete</i></a>
                    </div>
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
                    <label class="eventdesc grey-text">{{oneEventViewer.desc}}</label>
                    <div class="event-action">
                      <a href="#eventview" class="modal-trigger" v-on:click="fetchEventData(oneEventViewer.id), isView = true" ><i class="material-icons">remove_red_eye</i></a>
                      <a href="#eventupdate" class="modal-trigger" v-on:click="fetchEventData(oneEventViewer.id), isView = true" ><i class="material-icons teal-text ">edit</i></a>
                      <a href="#" @click.prevent="deleteEvent(oneEventViewer.id)" ><i class="material-icons deep-orange-text">delete</i></a>
                    </div>
                  </div>
              </div>
          </div>
      </vue-event-calendar>

      <!-- View Event Modal -->

      <div id="eventview" class="modal modal-fixed-footer">
        <div class="modal-content">
          <div class="modal-header light-blue ">
            <h4 id="todos-header ">Event Details</h4>
          </div>
          <div class="modal-fields">
            <div class="input-field">
              <i class="material-icons prefix">Date</i>
              <input id="event-date"  type="text" required v-model="fetchEvent.date" disabled>
              <label for="event-date" :class="[isView == true ? 'active' : '']" id="label-date">Date</label>
            </div>
            <div class="input-field">
              <i class="material-icons prefix">title</i>
              <input id="event-title"  type="text" v-model="fetchEvent.title" required disabled>
              <label for="event-title" :class="[isView == true ? 'active' : '']" id="label-title">Title</label>
            </div>
            <div class="input-field">
              <i class="material-icons prefix">description</i>
              <input id="event-description" type="text" v-model="fetchEvent.desc" required  disabled >
              <label for="event-description" :class="[isView == true ? 'active' : '']" id="label-desc" >Description</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a id= "close" class="modal-action modal-close waves-effect waves-light light-blue lighten-2 btn-flat" style="color:#ffffff;"><i class="material-icons">close</i></a>
        </div>
      </div>

      <!-- Update Event Modal -->

      <div id="eventupdate" class="modal modal-fixed-footer">
        <div class="modal-content">
          <div class="modal-header light-blue ">
            <h4 id="todos-header ">Event Update</h4>
          </div>
          <div class="modal-fields">
            <div class="input-field">
              <i class="material-icons prefix">Date</i>
              <input id="event-date"  type="text" required v-model="updatedate = fetchEvent.date" >
              <label for="event-date" :class="[isView == true ? 'active' : '']" id="label-date">Date</label>
            </div>
            <div class="input-field">
              <i class="material-icons prefix">title</i>
              <input id="event-title"  type="text" v-model="updatetitle = fetchEvent.title" required >
              <label for="event-title" :class="[isView == true ? 'active' : '']" id="label-title">Title</label>
            </div>
            <div class="input-field">
              <i class="material-icons prefix">description</i>
              <input id="event-description" type="text" v-model="updatedescription = fetchEvent.desc" required   >
              <label for="event-description" :class="[isView == true ? 'active' : '']" id="label-desc" >Description</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a id="cancel" class="btn btn-flat waves-effect waves-light white modal-close">Cancel</a>
          <a id= "update" class="modal-action modal-close waves-effect waves-light teal lighten-2 btn-flat" v-on:click="updateEvent()"style="color:#ffffff;">update</a>
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
        description:'',
        date:'',
        updatetitle:'',
        updatedescription:'',
        updatedate:'',
        eventsCalendar:[],
        eventView:[],
        isView : false,
        oneEventViewer:[],
        fetchEvent:[],
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
        });
      },

      subjectCounters(){
        var vm = this;
        axios.get(`subject-counters`).then(function(response){
          vm.subjectCounter = response.data;
        });
      },

      studentCounters(){
        var vm = this;
        axios.get(`student-counters`).then(function(response){
          vm.studentCounter = response.data;
        });
      },

      showEvents(){
        var vm = this;
        axios.get(`show-events`).then(function(response){
          vm.eventsCalendar = response.data;
        });
      },

      addEvent(){
        $('#event-title').val('');
        $('#event-description').val('');
        $('#event-date').val('');
        var vm = this;
          axios.post(`create-event`,{
            'title' : this.title,
            'description' : this.description,
            'date' : $('#date-event').val()
          }).then(function(response){
            console.log(response);
            Materialize.toast('Event Created !',3000,'rounded light-blue lighten-1');
            vm.showEvents();
            vm.refreshOneEventView();
          }).catch(function(error){
            console.log(error);
            Materialize.toast('Opps something went wrong !',3000,'rounded red lighten-1');
            vm.showEvents();
          });
      },

      fetchEventData(id){
        var vm = this;
        axios.get(`fetch-event-data/` + id).then(function(response){
          vm.fetchEvent = response.data[0];
        });
      },

      updateEvent(){
        var vm = this;
        axios.put(`update-event/` + this.fetchEvent.id,{
          'date' : this.fetchEvent.date,
          'title' : this.fetchEvent.title,
          'description' : this.fetchEvent.desc,
        }).then(function(response){
          vm.showEvents();
          vm.refreshOneEventView();
          Materialize.toast('Event Updated !',3000,'rounded light-blue lighten-1');
        }).catch(function(error){
          Materialize.toast('Opps something went wrong !',3000,'rounded red lighten-1');
        });
      },

      deleteEvent(id){
        if(confirm("Are you sure to delete ?")){
          var vm = this;
          axios.delete(`delete-event/` + id).then(function(response){
            vm.showEvents();
            Materialize.toast('Event deleted !',3000,'rounded light-blue lighten-1');
          });
        }
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

      refreshOneEventView(){
        $(".event-viewer").css("display","flex");
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
