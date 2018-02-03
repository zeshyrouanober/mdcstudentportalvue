
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// ADMIN
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('admindashboardvue',require('./components/admin/admindashboard.vue'));
Vue.component('announcementvue',require('./components/admin/announcement.vue'));
Vue.component('accountvue',require('./components/admin/account.vue'));
Vue.component('subjectvue',require('./components/admin/subject.vue'));
Vue.component('studentvue',require('./components/admin/student.vue'));
Vue.component('verificationvue',require('./components/admin/verification.vue'));
Vue.component('schoolcalendarvue',require('./components/admin/schoolcalendar.vue'));


// STUDENT
Vue.component('studentdashboardvue',require('./components/student/dashboard.vue'));
Vue.component('updatesandannouncementvue',require('./components/student/updatesandannouncement.vue'));
Vue.component('evaluationvue',require('./components/student/evaluation.vue'));
Vue.component('userprofilevue',require('./components/student/userprofile.vue'));
Vue.component('calendarvue',require('./components/student/calendar.vue'));
Vue.component('upcomingeventsvue',require('./components/student/upcomingevents.vue'));
Vue.component('todosvue',require('./components/student/todos.vue'));
Vue.component('faqsvue',require('./components/student/faqs.vue'));
Vue.component('helpvue',require('./components/student/help.vue'));


const app = new Vue({
    el: '.app'
});
