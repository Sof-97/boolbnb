<template>
    <div></div>
</template>
<script>
export default {
    name: "AdvancedSearch",
    data() {
        return {
            baseUrlTomtom: "https://api.tomtom.com/search/2/search/",
            keySettingsTomtom:
                ".json?key=igkbkqwR2f1uQStetPLGqvyGEGFKLvAA&language=it-IT&typeahed=true&limit=7&countrySet=IT3r10",
        };
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
        select(i) {
            this.search = this.autocomplete[i].address.freeformAddress;
        },
    },
};
</script>

<style lang="scss" scoped></style>
