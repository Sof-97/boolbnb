<template>
    <div>
        <!-- <div class="index-container index-mt-5"> -->
        <input
            type="text"
            v-model="search"
            class="index-search"
            placeholder="Cerca"
            @keyup.enter="searchPage"
        />

        <div class="index-container">


            <div class="index-cards">
                <div
                    v-for="(e, i) in apartments"
                    :key="i"
                    class="index-card"
                >

                    <!-- <div class="index-card-body"> -->

                        <div>
                            <img
                            class="index-img-top"
                            :src="`${e.cover_image}`"
                            alt="Card image cap"
                            />

                            <h5 class="index-card-title">{{ e.title }}</h5>
                            <p class="index-card-text">{{ e.description }}</p>

                        </div>

                        <div>
                            <p class="index-card-title">{{ e.price }}€</p>
                            <router-link
                                :to="{
                                    name: 'SingleApartment',
                                    params: { slug: e.slug },
                                }"
                                class="index-btn"
                                >Vai all'appartamento</router-link
                            >
                        </div>

                    <!-- </div> -->
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

<!-- <style lang="scss" scoped></style> -->

<style>
.index-cards{
    display:flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;

}

.index-card{
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    /* align-items: center; */
    justify-content: space-between;
    height: 600px;
    width: calc(100%/4);
    padding-top: 32px;
}

.index-img-top{
    width: 100%;

}

.index-btn{
    padding: 10px;
    color: red;
    border-radius: 10px;
    border: 0.2px solid grey;
    box-shadow: 2px 2px 1px gray;
}

/* .index-card-body{
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    height: 100%;
    justify-content: space-between; */
    /* align-items: center; */
/* } */

.index-container{
    width: 80vw;
    height: 70vh;
    margin: 0 auto;
    overflow: scroll;
}

.index-search{
    width: 60vw;
    margin-left: 20%;
    border-radius: 3px;
    box-shadow: 2px 2px 1px gray;
    border: 0.0 solid gray;
    margin-bottom: 10px;
}

</style>
