<template>
    <div>
        <h1>Search</h1>
        <div class="container">
            <input
                type="text"
                class="form-control my-3"
                placeholder="Cerca"
                @keyup.enter="getApartments"
            />
            <div class="row justify-content-between">
                <div
                    v-for="(e, i) in apartments"
                    :key="i"
                    class="col-3 card mb-5 p-2"
                >
                    <img
                        class="card-img-top"
                        :src="`${e.cover_image}`"
                        alt="Card image cap"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ e.title }}</h5>
                        <p class="card-text">{{ e.description }}</p>
                        <p class="card-title">{{ e.price }}€</p>
                        <router-link
                            :to="{
                                name: 'SingleApartment',
                                params: { slug: e.slug },
                            }"
                            class="btn btn-primary"
                            >Vai all'appartamento</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    name: "AdvancedSearch",
    data() {
        return {
            baseUrlTomtom: "https://api.tomtom.com/search/2/search/",
            keySettingsTomtom:
                ".json?key=igkbkqwR2f1uQStetPLGqvyGEGFKLvAA&language=it-IT&typeahed=true&limit=7&countrySet=IT3r10",
            apartments: null
        };
    },
    props: {
        query: {
            type: String,
            default: "",
        },
    },
    created() {
        this.getApartments(this.query);
    },
    methods: {
        getApartments(query) {
            console.log(query);
            axios
                .get("http://127.0.0.1:8000/api/apartments/search/" + query)
                .then((res) => {
                    this.apartments = res.data;
                    console.log(res.data);
                });
        },
        getInfoApi() {
            axios
                .get(this.baseUrlTomtom + this.search + this.keySettingsTomtom)
                .then((res) => {
                    this.autocomplete = res.data.results;
                });
        },
        select(i) {
            this.search = this.autocomplete[i].address.freeformAddress;
        },
    },
};
</script>

<style lang="scss" scoped></style>
