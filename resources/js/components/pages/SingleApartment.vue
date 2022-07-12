<template>
    <!-- scss di riferimento -singleaoartment.scss
    I nome delle classi iniziano con "sa" ad indicare "singleapartment"-->

    <div>
        <!-- Carta della casa -->
        <div class="sa-container">
            <div class="sa-title">Appartamento di</div>
            <div class="sa-owner">{{ apartment.title }}</div>
            <div class="sa-cont-img">
                <img :src="apartment.cover_image" alt="" />
            </div>
            <div class="sa-opacity">{{ apartment.description }}</div>
            <div class="sa-price">
                <i>Il prezzo a notte è:</i> <span>{{ apartment.price }}€</span>
            </div>
        </div>
        <!-- Form della email -->
        <div class="sa-form">
            <form @submit.prevent="submit">
                <label for="email">La tua email</label>
                <input
                    type="text"
                    name="email_sender"
                    id="email_sender"
                    v-model="fields.email_sender"
                />
                <label for="text">Il tuo messaggio</label>
                <input
                    type="text"
                    name="text"
                    id="text"
                    v-model="fields.text"
                />
                <input
                    value="apartment.id"
                    type="text"
                    name="apartment_id"
                    id="apartment_id"
                    v-model="fields.apartment_id"
                    hidden
                />
                <button type="submit">Invia</button>
            </form>
            <div class="container">
                <h1>Show</h1>
                <h2>{{ apartment.title }}</h2>
                <img :src="apartment.cover_image" alt="" />
                <p class="my-4">
                    Il prezzo a notte per l'appartamento è
                    {{ apartment.price }}€
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "SingleApartment",
    data() {
        return {
            fields: {},
            apartment: {},
        };
    },
    created() {
        this.getApartment();
    },
    methods: {
        submit() {
            this.errors = {};
            this.fields["apartment_id"] = this.apartment.id;
            axios
                .post("http://127.0.0.1:8000/api/messages", this.fields)
                .then((response) => {
                    alert("Message sent!");
                    this.fields.text = "";
                    this.fields.email_sender = "";
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
