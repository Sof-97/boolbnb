import Vue from "vue";
import VueRouter from "vue-router";
import SingleApartment from "./components/pages/SingleApartment.vue";
import NotFoundPage from "./components/pages/NotFoundPage.vue";
import LandingPage from "./components/pages/LandingPage.vue";
import AdvancedSearch from "./components/pages/AdvancedSearch.vue";

Vue.use(VueRouter);

// function query(route) {
//     return {
//         query: route.params.query
//     }
// }

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/show/:slug', component: SingleApartment, name: 'SingleApartment' },
        { path: '*', component: NotFoundPage, name: 'notFound' },
        { path: '/', component: LandingPage, name: 'LandingPage' },
        { path: '/search', component: AdvancedSearch, name: 'AdvancedSearch', props: route => ({query:route.query.search}) },
    ]
});

export default router;