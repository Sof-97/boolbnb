<template>
    <div>
        <div class="container mt-5">
            <input
                type="text"
                v-model="search"
                class="form-control my-3"
                placeholder="Cerca"
                @keyup="getApartments(search), getInfoApi()"
            />
            <div class="autocomplete" v-show="autocomplete != null">
                <ul>
                    <li :key="i" v-for="(e, i) in autocomplete" @click="select(i)" style="cursor:pointer;">
                        {{ e.address.freeformAddress }}
                    </li>
                </ul>
            </div>
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
                        <a href="" class="btn btn-primary"
                            >Vai ad appartamento</a
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
    name: "App",
    data() {
        return {
            apartments: null,
            autocomplete: null,
            search: null,
            baseUrlTomtom: "https://api.tomtom.com/search/2/search/",
            keySettingsTomtom:
                ".json?key=igkbkqwR2f1uQStetPLGqvyGEGFKLvAA&language=it-IT&typeahed=true&limit=7&countrySet=IT3r10",
        };
    },
    mounted() {
        this.getApartments("http://127.0.0.1:8000/api/apartments");
    },
    methods: {
        getApartments(query) {
            if (query == "") {
                query = "http://127.0.0.1:8000/api/apartments";
            }
            if (query != "http://127.0.0.1:8000/api/apartments") {
                query = "http://127.0.0.1:8000/api/apartments/search/" + query;
            }
            axios.get(query).then((res) => {
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
        select(i){
            this.search = this.autocomplete[i].address.freeformAddress;
        }
    },
};
</script>
<style lang="scss" scoped>
.autocomplete {
    margin-top: -15px ;
    padding-top: 20px ;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    border: 5px solid grey;
    border-top: 0;
    ul {
        list-style: none;
    }
}
</style>
