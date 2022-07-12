<template>
    <div class="form-group">
        <label for="address">Indirizzo</label>
        <input
            required
            autocomplete="off"
            @keyup="addressSearch"
            type="text"
            class="form-control"
            name="address"
            id="address"
            v-model="address"
            onclick="myFunction()"
        />
        <input type="text" hidden name="latitude" v-model="latitude" />
        <input type="text" hidden name="longitude" v-model="longitude" />
        <div
            :key="i"
            v-for="(result, i) in results"
            @click="selectAddress(i)"
            style="cursor: pointer"
        >
            {{ result.address.freeformAddress }}
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "FormAddress",
    props: {
        data: String,
    },
    data() {
        return {
            baseUrl: "https://api.tomtom.com/search/2/search/",
            address: this.data,
            tokenSettings:
                ".json?key=igkbkqwR2f1uQStetPLGqvyGEGFKLvAA&language=it-IT&typeahead=true&limit=7&countrySet=ITA",
            results: [],
            latitude: null,
            longitude: null,
        };
    },
    mounted() {
        this.addressSearch();
    },
    methods: {
        selectAddress(i) {
            console.log("gigi");
            this.address = this.results[i].address.freeformAddress;
            this.latitude = this.results[i].position.lat;
            this.longitude = this.results[i].position.lon;
            this.results = [];
        },
        addressSearch() {
            axios
                .get(this.baseUrl + this.address + this.tokenSettings)
                .then((res) => {
                    this.results = res.data.results;
                });
        },
    },
};

//funzione onclick
    function myFunction() {
        const ids = ['title', 'price', 'description', 'address', 'mq2', 'rooms', 'beds', 'bathrooms'];
        const elements = document.querySelectorAll(ids.map(id => `${id}`).join(''));
        elements.classList.add("border-click");
    }
</script>
