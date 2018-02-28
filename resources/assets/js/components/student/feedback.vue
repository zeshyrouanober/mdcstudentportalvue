<template lang="html">
  <div class="feedback-container">
    <div class="header-container  blue darken-3 z-depth-1">
      <label class="white-text">We've like to hear your feedback</label>
    </div><br>
    <div class="feedback-content-container ">
      <i class="material-icons amber-text">info_outline</i>
      <label class="blue-grey-text">Choose what type of feedback and fill the fields then click the button below to complete feedbac.k</label>
      <br><br>
      <div class="feedback-content white z-depth-1">
        <!-- <form method="post"> -->
          <div class="feedback-select">
            <select>
              <option value="" disabled selected>Select feedback type</option>
              <option v-model="type" value="Compliment">Compliment</option>              
              <option v-model="type" value="Enhancement Request">Enhancement Request</option>
              <option v-model="type" value="Bug Report">Bug Report</option>
              <option v-model="type" value="Design | Ease Of Use">Design | Ease Of Use</option>
            </select>
            <label>Materialize Select</label>
          </div>
          <br>
          <div class="feedback-message">
             <div class="input-field col s12">
                <textarea id="textarea1" v-model="content" class="materialize-textarea" required></textarea>
                <label for="textarea1">Your feedback</label>
             </div>
          </div>
          <div class="feedback-button">
            <a class="btn waves-effect waves-light blue darken-3 right" v-on:click="createFeedback()">feedback</a>
          </div>
        <!-- </form> -->
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

  export default {
    data(){
      return{
        type : '',
        content : '',

      }
    },

    methods:{

      createFeedback(){
        var vm = this;
        axios.post(`create-feedback`,{
          'type' : this.type,
          'content' : this.content,
        }).then(function(response){
          console.log(response);
        }).catch(function(error){
          console.log(error);
        });
      }

    },
  }
</script>
