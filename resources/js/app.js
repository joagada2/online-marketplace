require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');
import Vue from 'vue';
import VueChatScroll from 'vue-chat-scroll';
Vue.use(VueChatScroll);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('feature-image', require('./components/imagepreview/FeatureImage.vue').default);
Vue.component('first-image', require('./components/imagepreview/FirstImage.vue').default);
Vue.component('second-image', require('./components/imagepreview/SecondImage.vue').default);
Vue.component('category-dropdown', require('./components/CategoryDropDown.vue').default);
Vue.component('country-dropdown', require('./components/AddressDropDown.vue').default);
Vue.component('message', require('./components/Message.vue').default);
Vue.component('conversation', require('./components/Conversation.vue').default);
Vue.component('show-phone-number', require('./components/ShowPhoneNumber.vue').default);
Vue.component('save-ad', require('./components/SaveAd.vue').default);


const app = new Vue({
    el: '#app',

});