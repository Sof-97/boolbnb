<template>
    <div>
        <div class="container">
            <div class="flex advanced">
                <div class="posrev">
                    <input
                        type="text"
                        class="search-as"
                        placeholder="Inizia a cercare una destinazione"
                        @keyup.enter="select(0)"
                        @keyup="getInfoApi(search)"
                        v-model="search"
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
                            <li
                                :key="i"
                                v-for="(e, i) in autocomplete"
                                @click="select(i)"
                            >
                                {{ e.address.freeformAddress }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="filters-as flex posrev">
                    <div id="filter" @click="filterMenu">
                        <span> <i class="fa-solid fa-filter"></i>Filtri </span>
                    </div>
                    <div id="filter-list" class="show">
                        <ul>
                            <li :key="i" v-for="(e, i) in services">
                                <input
                                    type="checkbox"
                                    :name="e.name"
                                    :id="e.id"
                                    :value="e.id"
                                    v-model="checked"
                                /><label :for="e.id">
                                    {{ e.name }}
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="flex" style="align-items: center; margin-left:0.39rem">
                        <label for="radius">Raggio di ricerca:</label>
                        <input
                            type="range"
                            name="radius"
                            id="radius"
                            min="5"
                            max="500000"
                            step="5"
                            v-model="range"
                            @change="getApartments(range, lat, lon)"
                        />
                    </div>
                    <input
                        class="stanze-letti"
                        type="number"
                        placeholder="Stanze"
                        v-model="stanze"
                        min="1"
                        max="9"
                    />
                    <input
                        class="stanze-letti"
                        type="number"
                        placeholder="Letti"
                        name="letti"
                        v-model="letti"
                        min="1"
                        max="9"
                    />
                </div>
            </div>

            <div class="padding-dashboard" id="gallery">
                <div id="map"></div>
                <p
                    class="no-results-as"
                    v-show="!apartments || apartments.length == 0"
                >
                    Nessun appartamento corrispondente.
                </p>
                <div class="container-cards-as">
                    <div
                        v-for="(e, i) in apartments"
                        :key="i"
                        class="card-as"
                        v-show="
                            e.rooms >= stanze &&
                            e.beds >= letti &&
                            check(e.service)
                        "
                    >
                        <span class="card-img-as">
                            <img
                                :src="`${e.cover_image}`"
                                alt="Card image cap"
                            />
                            <div class="icons-as">
                                <span
                                    ><i class="fa-solid fa-bed"></i>
                                    {{ e.rooms }}</span
                                >
                                <span
                                    >- <i class="fa-solid fa-toilet"></i>
                                    {{ e.bathrooms }}</span
                                >
                            </div>
                        </span>
                        <div class="card-body-as">
                            <h3 class="card-title-as">{{ e.title }}</h3>
                            <p class="card-text-as">{{ e.description }}</p>
                            <p class="card-price-as">
                                <span>{{ e.price }}€</span> per Notte
                            </p>
                            <router-link
                                :to="{
                                    name: 'SingleApartment',
                                    params: { slug: e.slug },
                                }"
                                class="button-show"
                                >Vai all'appartamento</router-link
                            >
                        </div>
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
                ".json?key=igkbkqwR2f1uQStetPLGqvyGEGFKLvAA&language=it-IT&typeahed=true&limit=7&countrySet=IT",
            apartments: null,
            services: [],
            range: this.radius,
            lat2: this.lat,
            lon2: this.lon,
            autocomplete: null,
            search: null,
            stanze: "",
            letti: "",
            checked: [],
        };
    },
    props: {
        lat: {
            type: String,
            default: "",
        },
        lon: {
            type: String,
            default: "",
        },
        radius: {
            type: String,
            default: "",
        },
    },
    created() {
        this.getApartments(this.radius, this.lat, this.lon);
        this.getServices();
        const gallery = document.getElementById("gallery");
    },
    methods: {
        getMap() {
            let center = [this.lon2, this.lat2];
            let map = tt.map({
                key: "igkbkqwR2f1uQStetPLGqvyGEGFKLvAA",
                container: "map",
                center: center,
                zoom: 10,
            });
            for (let i = 0; i < this.apartments.length; i++) {
                new tt.Marker({ color: "#ff385c" })
                    .setLngLat([
                        this.apartments[i].longitude,
                        this.apartments[i].latitude,
                    ])
                    .addTo(map);
            }
        },
        filterMenu() {
            document.getElementById("filter-list").classList.toggle("show");
        },
        getApartments(radius, lat, lon) {
            axios
                .get(
                    "http://127.0.0.1:8000/api/distance/" +
                        radius +
                        "/" +
                        lat +
                        "/" +
                        lon
                )
                .then((res) => {
                    this.apartments = res.data;
                    this.getMap();
                });
        },
        getInfoApi() {
            if (!this.search == "") {
                axios
                    .get(
                        this.baseUrlTomtom +
                            this.search +
                            this.keySettingsTomtom
                    )
                    .then((res) => {
                        this.autocomplete = res.data.results;
                    });
            } else {
                this.autocomplete = [];
            }
        },
        select(i) {
            this.lat2 = this.autocomplete[i].position.lat;
            this.lon2 = this.autocomplete[i].position.lon;
            this.getApartments(this.range, this.lat2, this.lon2);
            this.search = "";
            this.autocomplete = [];
        },
        getServices() {
            axios.get("http://127.0.0.1:8000/api/services").then((res) => {
                res.data.forEach((e) => {
                    let obj = {
                        id: e.id,
                        name: e.name,
                    };
                    this.services.push(obj);
                });
            });
        },
        check(serv) {
            if (this.checked.length == 0) {
                return true;
            } else {
                if (!serv.length > 0) {
                    return false;
                }
                let apServ = [];
                let selected = [];
                serv.forEach((serv) => {
                    apServ.push(serv.id);
                });
                this.checked.forEach((check) => {
                    selected.push(check);
                });
                let check = false;
                selected.forEach((e) => {
                    if (apServ.includes(e)) {
                        check = true;
                    } else {
                        check = false;
                    }
                });
                return check;
            }
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
#filter {
    cursor: pointer;
    padding: 10px;
    border: 0.5px solid lightgray;
    border-radius: 10px;
    box-shadow: 5px 5px 10px 0px lightgrey;
    display: inline-block;
    min-width: fit-content;
    .fa-solid {
        margin: 0;
        margin-right: 0.2rem;
        opacity: 0.7;
    }
}

#filter-list {
    background: white;
    z-index: 1;
    position: absolute;
    height: 200px;
    top: 2.8rem;
    display: inline-block;
    padding: 10px 20px;
    overflow-y: scroll;
    border: 1px solid grey;
    border-radius: 10px;
    &::-webkit-scrollbar {
        width: 10px;
    }
    input {
        margin-right: 0;
        margin-left: auto;
    }
    ul {
        list-style: none;
        li {
            padding: 3px 0;
            label {
                cursor: pointer;
            }
        }
    }
}

#map {
    width: 70%;
    height: 400px;
    margin: 1rem auto;
    border-radius: 10px;
}
@media screen and (max-width: 1024px) {
    #map {
        width: 80%;
        height: 400px;
    }
    .container {
        .advanced {
            flex-direction: column;
            .posrev {
                margin-bottom: 1rem;
                width: 100%;
            }
        }
    }
}
@media screen and (max-width: 820px) {
    #map {
        width: 90%;
        height: 400px;
    }
}
.advanced {
    .posrev {
        width: 50%;
    }
}

.posrev {
    position: relative !important;
    input[type="text"]:focus {
        border: 2px solid black;
    }
}
.show {
    display: none !important;
}
input[type="text"],
input[type="number"] {
    border: 0.5px solid lightgray;
    border-radius: 10px;
    box-shadow: 5px 5px 10px 0px lightgrey;
    padding: 10px 15px 10px 15px;
}
input[type="number"] {
    margin: 0 0.2rem;
}
</style>
