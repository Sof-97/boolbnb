<template>

    <!-- scss di riferimento -singleaoartment.scss
    I nome delle classi iniziano con "sa" ad indicare "singleapartment"-->

<div>

    <div class="sa-container">
        <div class="sa-title">Appartamento di</div>
        <div class="sa-owner">{{apartment.title}}</div>
        <div class="sa-cont-img">
            <img :src="apartment.cover_image" alt="">
        </div>
        <div class="sa-opacity">{{apartment.description}}</div>
        <div class="sa-price"><i>Il prezzo a notte è:</i> <span>{{apartment.price}}€</span></div>
    </div>

    <div class="sa-form">
        <form action="../php/SendMessage.php" method="GET">
            <div><i>Per info</i></div>

            <div>
                <input type="number" name="id_apartment" id="id_apartment" :value="apartment.id" hidden required>
                <input type="email" name="email" id="email" required placeholder="Tua email">
                <input type="text" name="text" id="text" required placeholder="Testo messaggio">
            </div>

            <div class="sa-form-bt">
                <input type="submit" value="Invia">
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
