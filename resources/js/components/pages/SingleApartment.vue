<template>
    <div class="container">
        <h1>Show</h1>
        <h2>{{apartment.title}}</h2>
        <img :src="apartment.cover_image" alt="">
        <p class="my-4">Il prezzo a notte per l'appartamento è {{apartment.price}}€</p>
        <form>
            <input type="number" name="id_apartment" id="id_apartment" :value="apartment.id" hidden required>
            <input type="email" name="email" id="email" v-model="email" required>
            <input type="text" name="text" id="text" v-model="text" required>
            <input type="submit" value="Invia" @submit="message">
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "SingleApartment",
    data() {
        return {
            apartment: null,
            text: null,
            email: null
        };
    },
    created() {
        this.getApartment();
    },
    methods: {
        message(){
            axios.post("http://127.0.0.1:8000/api/messages/", {params: {
                email_sender: this.email,
                text: this.text,
                id_apartment: this.apartment.id,
            }
            })
        },
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
