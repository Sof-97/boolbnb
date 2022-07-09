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

            <div class="position-relative">

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
            <div class="index-cards" id="gallery">

                <div
                    v-for="(e, i) in apartments"
                    :key="i"
                    class="index-card"
                >

                    <!-- <div class="index-card-body"> -->

                        <div>
                            <div class="index-img-cont">
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

                    <!-- </div> -->
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
.index-container{
    // box-shadow: 5px 10px #888888;
    width: 96vw;
    margin: 0 auto;
    z-index: 10;
}

.opacity {
    opacity: 0.5;
}

.index-cards{
    display:flex;
    flex-wrap: wrap;
    justify-content: start;
    align-items: center;
    overflow: auto;
    height: 80vh;
    width: 50vw;
    margin: 0 auto;
}

.index-card{
    border: 1px solid;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    height: 600px;
    width: calc((100%/4) - 10px);
    padding: 10px 10px 20px 10px;
    margin-left: 5px;
    margin-top: 16px;
    border-radius: 10px;
}

.index-img-cont{
width: auto;
height: auto;
border-radius: 20px;
text-align: center;
}

.index-img-top{
    width: 100%;
    // margin-left: 7px;
    border-radius: 20px;

}

.index-btn{
    padding: 10px;
    color: red;
    border-radius: 10px;
    border: 0.2px solid grey;
    box-shadow: 2px 2px 1px gray;
}

.index-container{
    width: 80vw;
    height: 70vh;
    margin: 0 auto;

}

.index-search{
    width: 40vw;
    margin-left: 30%;
    border-radius: 5px;
    box-shadow: 2px 2px 1px gray;
    border: 0.0 solid gray;
    // margin-bottom: 5px;
    margin-top: 16px;
    padding: 5px 5px 5px 15px;
}

.index-card-title{
    margin-top: 10px;
    font-size: 1.2em;
    font-weight: 700;
}
</style>
