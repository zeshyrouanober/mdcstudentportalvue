<template lang="html">
  <div class="content-container ">
    <div class="content-header z-depth-2">
      <label class="verification">Verifications </label>
      <input type="number" v-model="generate" name="numberVerification" required id="number-of-verification" >
      <a class="waves-effect waves-light btn blue darken-1 generate " style="margin:auto; margin-left:5px!important; margin-right:5px!important;" v-on:click="generatedVerification()" >Generate</a>
    </div>
    <div class="pdf-button-container">
      <a id="verificationpdf"  v-on:click="verificationPDF()"  class="btn-floating waves-effect right waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Print Verification" ><i class="material-icons">picture_as_pdf</i></a>
    </div>
    <div class="verification-tab z-depth-2">
     <div class="tabs-container">
       <ul class="tabs">
         <li class="tab"><a href="#verification" class="active" v-on:click="showVerifications()" >Verifications   ( {{allverifications}} ) </a></li>
         <li class="tab"><a href="#notactivated"  v-on:click="notActivatedVerifications()" >Available  ( {{availableverifications}} )</a></li>
         <li class="tab"><a href="#activated" v-on:click="activatedVerifications()">Activated ( {{activatedverifications}} )</a></li>
       </ul>
     </div>
     <div id="verification">
        <div class="verification-list">
          <table class="striped">
            <thead>
              <tr>
                <th>Verifications</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="ver in verifications">
                <td>{{ver.verification}}</td>
                <td v-if="ver.status == 1" class="blue-text">Activated</td>
                <td v-else class="green-text">Available</td>

              </tr>
            </tbody>
          </table>
        </div>
        <div class="pagination-container">
          <ul class="pagination">
            <li class="waves-effect waves-light" v-if="pagination.current_page > 1"><a href="#" @click.prevent="changepage(pagination.current_page - 1)"><i class="material-icons">chevron_left</i></a></li>
            <li class="waves-effect waves-light"  v-for="page in pagesNumber" v-bind:class="[ page == isActive ? 'active blue':'']"><a href="#" @click.prevent="changepage(page)">{{page}}</a></li>
            <li class="waves-effect waves-light" v-if="pagination.current_page < pagination.last_page"><a href="#" @click.prevent="changepage(pagination.current_page + 1)"><i class="material-icons">chevron_right</i></a></li>
          </ul>
        </div>
     </div>
     <div id="notactivated">
       <div class="verification-list">
         <table class="striped">
           <thead>
             <tr>
                 <th>Verifications</th>
                 <th>Status</th>
             </tr>
           </thead>
           <tbody>
             <tr v-for="na in notactivated">
               <td>{{na.verification}}</td>
               <td class="green-text">Available</td>
             </tr>
           </tbody>
         </table>
       </div>
       <div class="pagination-container">
         <ul class="pagination">
           <li class="waves-effect waves-light" v-if="notactivatedpagination.current_page > 1"><a href="#" @click.prevent="changepageNotActivated(notactivatedpagination.current_page - 1)"><i class="material-icons">chevron_left</i></a></li>
           <li class="waves-effect waves-light"  v-for="page in pagesNumberNA" v-bind:class="[ page == isActive ? 'active blue':'']"><a href="#" @click.prevent="changepageNotActivated(page)">{{page}}</a></li>
           <li class="waves-effect waves-light" v-if="notactivatedpagination.current_page < notactivatedpagination.last_page"><a href="#" @click.prevent="changepageNotActivated(notactivatedpagination.current_page + 1)"><i class="material-icons">chevron_right</i></a></li>
         </ul>
       </div>
     </div>
     <div id="activated">
       <div class="verification-list">
         <table class="striped">
           <thead>
             <tr>
                 <th>Verifications</th>
                 <th>Status</th>
             </tr>
           </thead>
           <tbody>
             <tr v-for="ac in activated">
               <td>{{ac.verification}}</td>
               <td class="blue-text">Activated</td>
             </tr>
           </tbody>
         </table>
       </div>
       <div class="pagination-container">
         <ul class="pagination">
           <li class="waves-effect waves-light" v-if="activatedpagination.current_page > 1"><a href="#" @click.prevent="changepageActivated(activatedpagination.current_page - 1)"><i class="material-icons">chevron_left</i></a></li>
           <li class="waves-effect waves-light"  v-for="page in pagesNumberA" v-bind:class="[ page == isActive ? 'active blue':'']"><a href="#" @click.prevent="changepageActivated(page)">{{page}}</a></li>
           <li class="waves-effect waves-light" v-if="activatedpagination.current_page < activatedpagination.last_page"><a href="#" @click.prevent="changepageActivated(activatedpagination.current_page + 1)"><i class="material-icons">chevron_right</i></a></li>
         </ul>
       </div>
     </div>
   </div>
 </div>
</template>

<script type="text/javascript">
  import axios from 'axios';
  export default {
    data(){
      return{
        pagination:[],
        verifications:[],
        offset:4,
        notactivated:[],
        notactivatedpagination:[],
        activated:[],
        activatedpagination:[],
        generate:'',
        status:'',
        allverifications:'',
        availableverifications:'',
        activatedverifications:''
      }
    },
    mounted(){
      this.showVerifications();
      this.notActivatedVerifications();
      this.activatedVerifications();
    },

    methods:{
      showVerifications(page){
        var vm = this;
        axios.get(`show-verifications?page=` + page).then(function(response){
          vm.verifications = response.data.verifications.data;
          vm.pagination = response.data.verifications;
          vm.allverifications = response.data.verifCount;
        });
      },

      changepage(next){
       this.pagination.current_page = next;
       this.showVerifications(next);
     },

     changepageNotActivated(next){
      this.notactivatedpagination.current_page = next;
      this.notActivatedVerifications(next);
    },

    changepageActivated(next){
     this.activatedpagination.current_page = next;
     this.activatedVerifications(next);
   },

     notActivatedVerifications(page){
       var vm = this;
       axios.get(`not-activated?page=` + page).then(function(response){
         vm.notactivated = response.data.notactivatedverifications.data;
         vm.notactivatedpagination = response.data.notactivatedverifications;
         vm.availableverifications = response.data.countNotActVerifications;
       });
     },

     activatedVerifications(page){
       var vm = this;
       axios.get(`activated?page=` + page).then(function(response){
         vm.activated = response.data.activatedverifications.data;
         vm.activatedpagination = response.data.activatedverifications;
         vm.activatedverifications = response.data.countActVerifications;
       });
     },

     generatedVerification(){
       var vm = this;
       axios.post(`generate-verification`,{
         'generate' : this.generate,
       }).then(function(response){
         vm.showVerifications();
         vm.notActivatedVerifications();
         vm.activatedVerifications();
         vm.generate = '';
         Materialize.toast('Verifications generated !',3000,'rounded light-blue lighten-1');
       });
     },

     verificationPDF(){
       var vm = this;
       axios.get(`generate-verification-pdf`).then(function(response){
         location.href="generate-verification-pdf";
         Materialize.toast('Verification downloaded !',3000,'rounded light-blue lighten-1');
       });
     }

    },

    computed:{
       isActive:function(){
         return this.pagination.current_page;
       },
       pagesNumber:function(){
         if (!this.pagination.to) {
            return [];
         }
         var from = this.pagination.current_page - this.offset;
         if (from < 1) {
             from = 1;
         }
         var to = from + (this.offset * 2);
         if (to >= this.pagination.last_page) {
             to = this.pagination.last_page;
         }
         var pagesArray = [];
         while (from <= to) {
             pagesArray.push(from);
             from++;
         }
         return pagesArray;
       },

       isActive:function(){
         return this.notactivatedpagination.current_page;
       },
       pagesNumberNA:function(){
         if (!this.notactivatedpagination.to) {
            return [];
         }
         var from = this.notactivatedpagination.current_page - this.offset;
         if (from < 1) {
             from = 1;
         }
         var to = from + (this.offset * 2);
         if (to >= this.notactivatedpagination.last_page) {
             to = this.notactivatedpagination.last_page;
         }
         var pagesArray = [];
         while (from <= to) {
             pagesArray.push(from);
             from++;
         }
         return pagesArray;
       },

       isActive:function(){
         return this.activatedpagination.current_page;
       },
       pagesNumberA:function(){
         if (!this.activatedpagination.to) {
            return [];
         }
         var from = this.activatedpagination.current_page - this.offset;
         if (from < 1) {
             from = 1;
         }
         var to = from + (this.offset * 2);
         if (to >= this.activatedpagination.last_page) {
             to = this.activatedpagination.last_page;
         }
         var pagesArray = [];
         while (from <= to) {
             pagesArray.push(from);
             from++;
         }
         return pagesArray;
       },

     },

  }

</script>
