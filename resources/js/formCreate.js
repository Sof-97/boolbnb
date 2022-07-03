console.log("gigi");

window.Vue = require('vue');

Vue.component('form-create', require('./components/FormCreate.vue').default);

const app = new Vue({
    el: '#app',
    rendere: h=>h(App)
});