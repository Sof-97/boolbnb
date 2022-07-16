<template>
    <!-- scss di riferimento -singleaoartment.scss
    I nome delle classi iniziano con "sa" ad indicare "singleapartment"-->

    <div style="padding-top: 0.5rem">
        <!-- Carta della casa -->
        <div class="sa-container">
            <div class="sa-title">Appartamento</div>
            <span class="sa-owner">{{ apartment.title }}</span>
            <div class="sa-cont-img">
                <img :src="apartment.cover_image" alt="" />
                <div id="map" class="id"></div>
            </div>
            <div class="sa-opacity">{{ apartment.description }}</div>
            <div class="sa-price">
                <i>Il prezzo a notte è:</i> <span>{{ apartment.price }}€</span>
            </div>
            <div >
                <span class="sa-price">Servizi inclusi:</span>
                <ul>
                    <li :key="service.id" v-for="service in apartment.service">
                        {{service.name}}
                    </li>
                </ul>
            </div>
                <!-- Form della email -->
            <form @submit.prevent="submit">
                <label for="email">La tua email</label>
                <input
                    class="form-control form-create"
                    type="email"
                    required
                    :disabled="userEmail"
                    name="email_sender"
                    id="email_sender"
                    v-model="fields.email_sender"
                />
                <br />
                <label for="text">Il tuo nome</label>
                <input
                    class="form-control form-create"
                    type="text"
                    required
                    :disabled="userName"
                    name="name"
                    id="name"
                    v-model="fields.name"
                />
                <br />
                <label for="text">Il tuo messaggio</label>
                <textarea
                    class="form-control form-create description-form"
                    type="text"
                    required
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
                <div class="submit">
                    <button class="button-send" type="submit">Invia</button>
                </div>
            </form>
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
            userEmail: window.user,
            userName: window.name,
        };
    },
    created() {
        this.getApartment();
        if (window.user) {
            this.fields.email_sender = window.user;
            this.fields.name = window.name;
        }
    },
    methods: {
        getMap() {
            let center = [this.apartment.longitude, this.apartment.latitude];
            let map = tt.map({
                key: "igkbkqwR2f1uQStetPLGqvyGEGFKLvAA",
                container: "map",
                center: center,
                zoom: 15,
            });
            new tt.Marker({ color: "#ff385c" }).setLngLat(center).addTo(map);
        },
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
                .then((res) => {
                    this.apartment = res.data;
                    this.getMap();
                });
        },
    },
};
</script>
<style lang="scss" scoped>
.submit {
    display: flex;
    justify-content: flex-end;
    margin: 0.5rem 0;
}
.description-form {
    width: 100% !important;
}
ul{
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    li{
        border: 1px solid lightgray;
        padding:0.35rem;
        border-radius: 0.5rem;
        box-shadow: 5px 5px 10px 0px lightgrey;
        margin-left: 1rem;
        margin-top: 0.2rem;
        opacity: 0.8;
    }
}
</style>
