<template>
    <div class="container">
        <h1>Show</h1>
        <h2>{{ apartment.title }}</h2>
        <img :src="apartment.cover_image" alt="" />
        <p class="my-4">
            Il prezzo a notte per l'appartamento è {{ apartment.price }}€
        </p>

        <form @submit.prevent="submit">
            <label for="email">La tua email</label>
            <input
                type="text"
                name="email_sender"
                id="email_sender"
                v-model="fields.email"
            />
            <label for="text">Il tuo messaggio</label>
            <input type="text" name="text" id="text" v-model="fields.text" />
            <!-- <input
                :value="apartment.id"
                type="text"
                name="id_apartment" 
                id="id_apartment"
                hidden
            /> -->
            <button type="submit">Invia</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "SingleApartment",
    data() {
        return {
            fields: {
                id: 1,
            },
            apartment: null,
        };
    },
    created() {
        this.getApartment();
    },
    methods: {
        submit() {
            this.errors = {};
            axios
                .post("http://127.0.0.1:8000/api/messages", this.fields)
                .then((response) => {
                    alert("Message sent!");
                    console.log(response);
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                });
        },
        getApartment() {
            axios
                .get(
                    "http://127.0.0.1:8000/api/apartments/" +
                        this.$route.params.slug.split("/show")
                )
                .then((res) => (this.apartment = res.data));
        },
    },
};
</script>

<style lang="scss" scoped></style>
