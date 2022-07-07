<template>
    <div class="container">
        <h1>Show</h1>
        <h2>{{apartment.title}}</h2>
        <img :src="apartment.cover_image" alt="">
        <p class="my-4">Il prezzo a notte per l'appartamento è{{apartment.price}}€</p>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "SingleApartment",
    data() {
        return {
            apartment: null,
        };
    },
    created() {
        this.getApartment();
    },
    methods: {
        getApartment() {
            console.log("gigi");
            axios
                .get(
                    "http://127.0.0.1:8000/api/apartments/" +
                        this.$route.params.slug.split('/show')
                )
                .then((res) => this.apartment = res.data);
        },
    },
};
</script>
<style lang="scss" scoped>
h1 {
    color: red;
}
</style>
