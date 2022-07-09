<template>
    <div>
        <div class="container mt-5">
            <div class="position-relative">
                <input
                    type="text"
                    v-model="search"
                    class="form-control my-3"
                    placeholder="Cerca"
                    @keyup.enter="select(0)"
                    @keyup="getInfoApi(search)"
                />
                <div
                    class="autocomplete"
                    v-show="
                        autocomplete != null &&
                        autocomplete.length > 0 &&
                        search != ''
                    "
                >
                    <ul>
                        <li :key="i" v-for="(e, i) in autocomplete" @click="select(i)">
                            {{ e.address.freeformAddress }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-between" id="gallery">
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
    name: "LandingPage",
    data() {
        return {
            baseUrlTomtom: "https://api.tomtom.com/search/2/search/",
            keySettingsTomtom:
                ".json?key=igkbkqwR2f1uQStetPLGqvyGEGFKLvAA&language=it-IT&typeahed=true&limit=7&countrySet=IT",
            apartments: null,
            search: "",
            autocomplete: null,
            lat: null,
            lon: null,
        };
    },
    mounted() {
        this.getApartments("http://127.0.0.1:8000/api/apartments");
        const gallery = document.getElementById("gallery");
    },
    methods: {
        getInfoApi(query) {
            if (query == "") {
                return false;
            }
            axios
                .get(this.baseUrlTomtom + query + this.keySettingsTomtom)
                .then((res) => {
                    this.autocomplete = res.data.results;
                });
        },
        select(i) {
            this.search = this.autocomplete[i].address.freeformAddress;
            this.lat = this.autocomplete[i].position.lat;
            this.lon = this.autocomplete[i].position.lon;
            this.searchPage();
        },
        getApartments(query) {
            axios.get(query).then((res) => (this.apartments = res.data));
        },
        searchPage() {
            this.$router.push({
                path: "/search",
                query: { radius: "20", lat: this.lat, lon: this.lon },
            });
        },
    },
    watch: {
        autocomplete: function () {
            if (this.autocomplete.length > 0) {
                gallery.classList.add("opacity");
            } else {
                gallery.classList.remove("opacity");
            }
        },
    },
};
</script>

<style lang="scss" scoped>
.autocomplete {
    z-index: 10;
    width: 50%;
    background-color: #fff;
    padding: 20px;
    border: 1px solid black;
    border-radius: 20px;
    position: absolute;
    ul {
        list-style: none;
        li {
            font-family: monospace;
            opacity: 0.7;
            border-bottom: 1px solid grey;
            padding: 5px 0;
            cursor: pointer;
            &:last-of-type {
                border: none;
            }
            &:hover{
                opacity: 1;
            }
        }
    }
}
.opacity {
    opacity: 0.5;
}
</style>
