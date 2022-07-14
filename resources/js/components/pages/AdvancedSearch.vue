<template>
    <div>
        <div class="container">
            <div class="flex posrev">
                <input
                    type="text"
                    class="form-control my-3"
                    placeholder="Cerca"
                    @keyup.enter="select(0)"
                    @keyup="getInfoApi(search)"
                    v-model="search"
                />
                <div>
                    <div id="filter" @click="filterMenu">
                        <i class="fa-solid fa-filter"></i>
                    </div>
                    <div id="filter-list" class="show">
                        <ul>
                            <li :key="i" v-for="(e, i) in services">
                                <label :for="e.id">
                                    {{ e.name }}
                                </label>
                                <input
                                    type="checkbox"
                                    :name="e.name"
                                    :id="e.id"
                                    :value="e.id"
                                    v-model="checked"
                                />
                            </li>
                        </ul>
                    </div>

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
                    <label for="radius">Raggio di ricerca </label>
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
                    <input
                        type="number"
                        name="stanze"
                        v-model="stanze"
                        min="1"
                        max="9"
                    />
                    <input
                        type="number"
                        name="letti"
                        v-model="letti"
                        min="1"
                        max="9"
                    />
                </div>
            </div>

            <p v-show="!apartments || apartments.length == 0">
                Nessun appartamento corrispondente.
            </p>
            <div class="row justify-content-between">
                <div
                    v-for="(e, i) in apartments"
                    :key="i"
                    class="col-3 card mb-5 p-2"
                    v-show="
                        e.rooms >= stanze && e.beds >= letti && check(e.service)
                    "
                >
                    <h2>TEST: {{ check(e.service) }}</h2>
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
            apartments: null,
            services: [],
            range: this.radius,
            lat2: this.lat,
            lon2: this.lon,
            autocomplete: null,
            search: null,
            stanze: 1,
            letti: 1,
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
    },
    methods: {
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
            this.lat2 = this.autocomplete[i].position.lat;
            this.lon2 = this.autocomplete[i].position.lon;
            this.getApartments(this.range, this.lat2, this.lon2);
            this.search = "";
        },
        getServices() {
            axios.get("http://127.0.0.1:8000/api/services").then((res) => {
                res.data.forEach((e) => {
                    let obj = { id: e.id, name: e.name };
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
                let check = false
                selected.forEach((e) => {
                    if (apServ.includes(e)) {
                        check = true
                    } else {
                        check = false 
                    }
                });
                return check
            }
        },
    },
};
</script>

<style lang="scss" scoped>
#filter {
    cursor: pointer;
    padding: 10px;
    border: 1px solid black;
    border-radius: 10px;
    display: inline-block;
}
#filter-list {
    background: white;
    z-index: 1;
    position: absolute;
    height: 200px;
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
.posrev {
    position: relative !important;
    .autocomplete {
        z-index: 10;
        margin-top: 1em;
        left: 0;
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
                &:hover {
                    opacity: 1;
                }
            }
        }
    }
}
.show {
    display: none !important;
}
</style>
