import Vue from "vue";
import VueRouter from "vue-router";
import SingleApartment from "./components/pages/SingleApartment.vue";
import NotFoundPage from "./components/pages/NotFoundPage.vue";
import LandingPage from "./components/pages/LandingPage.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path : '/show/:slug', component: SingleApartment, name: 'SingleApartment'
        },
        { path: '*', component: NotFoundPage, name: 'notFound' },
        { path: '/', component: LandingPage, name: 'LandingPage' },
    ]
});

export default router;