import Vue from "vue";
import VueRouter from "vue-router";
import TestPage from './components/pages/TestPage.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path : '/', component: TestPage, name: 'TestPage'
        }
    ]
});

export default router;