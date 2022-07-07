<template>
    <div>
        <div class="container mt-5">
            <input
                type="text"
                v-model="search"
                class="form-control my-3"
                placeholder="Cerca"
                @keyup.enter="searchPage"
            />
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
    name: "LandingPage",
    data() {
        return {
            apartments: null,
            search: "",
        };
    },
    mounted() {
        this.getApartments("http://127.0.0.1:8000/api/apartments");
    },
    methods: {
        getApartments(query) {
            axios.get(query).then((res) => (this.apartments = res.data));
        },
        searchPage() {
            this.$router.push({
                path: "/search",
                query: { search: this.search },
            });
        },
    },
};
</script>

<style lang="scss" scoped></style>
