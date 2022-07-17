<template>
    <div class="landpage">
        <!-- Tasti ricerca -->
        <div class="index-search-bar">
            <input
                type="text"
                v-model="search"
                class="index-search"
                placeholder="Inizia a cercare una destinazione"
                @keyup.enter="select(0)"
                @keyup="getInfoApi(search)"
            />

            <!-- Auto complete suggerimenti-->
            <div
                class="autocomplete"
                v-show="
                    autocomplete != null &&
                    autocomplete.length > 0 &&
                    search != ''
                "
            >
                <ul>
                    <li
                        :key="i + 'autocomplete'"
                        v-for="(e, i) in autocomplete"
                        @click="select(i)"
                    >
                        {{ e.address.freeformAddress }}
                    </li>
                </ul>
            </div>
        </div>

        <!-- HERO -->
        <!-- <div class="hero"></div> -->

        <!-- Elenco delle cards -->
        <div class="index-cards" id="gallery">
            <div
                v-for="(e, i) in sponsored"
                :key="i + 'sponsored'"
                class="index-card custom"
            >
                <!-- Immagine e icone -->
                <div class="index-cover-img">
                    <div class="index-sponsor">Sponsored</div>
                    <img
                        class="index-img-top"
                        :src="`/storage/${e.cover_image}`"
                        alt="Card image cap"
                    />
                    <!-- Icone Letti e bagni -->
                    <div class="index-cover-img-l">
                        <i class="fa-solid fa-bed"></i
                        ><span>{{ e.rooms }}</span>
                        <i class="fa-solid fa-toilet"></i
                        ><span>{{ e.bathrooms }}</span>
                    </div>
                </div>
                <div class="index-card-text">
                    <p class="index-card-title">{{ e.title }}</p>
                    <p>{{ e.description }}</p>
                </div>
                <div class="index-card-price" style="width: 100%">
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
            <div
                v-for="(e, i) in apartments"
                :key="i"
                class="index-card custom"
            >
                <!-- Immagine e icone -->
                <div class="index-cover-img">
                    <img
                        class="index-img-top"
                        :src="`/storage/${e.cover_image}`"
                        alt="Card image cap"
                    />
                    <!-- Icone Letti e bagni -->
                    <div class="index-cover-img-l">
                        <i class="fa-solid fa-bed"></i
                        ><span>{{ e.rooms }}</span>
                        <i class="fa-solid fa-toilet"></i
                        ><span>{{ e.bathrooms }}</span>
                    </div>
                </div>
                <div class="index-card-text">
                    <p class="index-card-title">{{ e.title }}</p>
                    <p>{{ e.description }}</p>
                </div>
                <div class="index-card-price" style="width: 100%">
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
            apartments: [],
            sponsored: [],
            search: "",
            autocomplete: null,
            lat: null,
            lon: null,
            all: null,
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
            axios.get(query).then((res) => {
                this.array = res.data;
                this.array.forEach((element) => {
                    if (element.sponsorship.length > 0) {
                        this.sponsored.push(element);
                    } else {
                        this.apartments.push(element);
                    }
                });
            });
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
