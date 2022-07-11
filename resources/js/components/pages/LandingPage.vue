<template>
    <div>
            <input
                type="text"
                v-model="search"
                class="index-search"
                placeholder="Inizia a cercare una destinazione"
                @keyup.enter="select(0)"
                @keyup="getInfoApi(search)"
            />
        <div class="index-container">
            <!-- barra di ricerca -->
            <div>
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

            <!-- Elenco delle cards -->
            <div class="index-cards" id="gallery">

                <div
                    v-for="(e, i) in apartments"
                    :key="i"
                    class="index-card"
                >
                        <div>
                            <div>
                                <img
                                class="index-img-top"
                                :src="`${e.cover_image}`"
                                alt="Card image cap"
                                />
                            </div>

                            <div class="index-card-title">{{ e.title }}</div>
                            <div class="index-card-text">{{ e.description }}</div>
                        </div>

                        <div>
                            <p class="index-card-price">{{ e.price }}€</p>
                            <router-link
                                :to="{
                                    name: 'SingleApartment',
                                    params: { slug: e.slug },
                                }"
                                class="index-btn"
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
        // FIXME variabile gallery non usata
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

</style>
