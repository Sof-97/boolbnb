<template>
  <div>
    <div class="container mt-5">
      <div class="position-relative">
        <input
          type="text"
          v-model="search"
          class="form-control my-3"
          placeholder="Cerca"
          @keyup.enter="select(0)"
          @keyup="getInfoApi(search)"
        />
        <div class="autocomplete" v-show="autocomplete != null && autocomplete.length > 0 && search != ''">
          <ul>
            <li :key="i" v-for="(e, i) in autocomplete" @click="select(i)">
              {{ e.address.freeformAddress }}
            </li>
          </ul>
        </div>
      </div>
      <div class="row justify-content-between" id="gallery">
        <div v-for="(e, i) in apartments" :key="i" class="index-card">
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
      baseUrlTomtom: "https://api.tomtom.com/search/2/search/",
      keySettingsTomtom:
        ".json?key=igkbkqwR2f1uQStetPLGqvyGEGFKLvAA&language=it-IT&typeahed=true&limit=7&countrySet=IT",
      apartments: null,
      search: "",
      autocomplete: null,
      lat: null,
      lon: null,
    };
  },
  mounted() {
    this.getApartments("http://127.0.0.1:8000/api/apartments");
    const gallery = document.getElementById("gallery");
  },
  methods: {
    getInfoApi(query) {
      if (query == "") {
        return false;
      }
      axios
        .get(this.baseUrlTomtom + query + this.keySettingsTomtom)
        .then((res) => {
          this.autocomplete = res.data.results;
        });
    },
    select(i) {
      this.search = this.autocomplete[i].address.freeformAddress;
      this.lat = this.autocomplete[i].position.lat;
      this.lon = this.autocomplete[i].position.lon;
      this.searchPage();
    },
    getApartments(query) {
      axios.get(query).then((res) => (this.apartments = res.data));
    },
    searchPage() {
      this.$router.push({
        path: "/search",
        query: { radius: "20", lat: this.lat, lon: this.lon },
      });
    },
  },
  watch: {
    autocomplete: function () {
      if (this.autocomplete.length > 0) {
        gallery.classList.add("opacity");
      } else {
        gallery.classList.remove("opacity");
      }
    },
  },
};
</script>




<style lang="scss" scoped>
.autocomplete {
  z-index: 10;
  width: 50%;
  background-color: #fff;
  padding: 20px;
  border: 1px solid black;
  border-radius: 20px;
  position: absolute;
  ul {
    list-style: none;
    li {
      font-family: monospace;
      opacity: 0.7;
      border-bottom: 1px solid grey;
      padding: 5px 0;
      cursor: pointer;
      &:last-of-type {
        border: none;
      }
      &:hover {
        opacity: 1;
      }
    }
  }
}
.opacity {
  opacity: 0.5;
}

.index-cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  align-items: center;
}

.index-card {
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  /* align-items: center; */
  justify-content: space-between;
  height: 600px;
  width: calc(100% / 4);
  padding-top: 32px;
}

.index-img-top {
  width: 100%;
}

.index-btn {
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

.index-container {
  width: 80vw;
  height: 70vh;
  margin: 0 auto;
  overflow: scroll;
}

.index-search {
  width: 60vw;
  margin-left: 20%;
  border-radius: 3px;
  box-shadow: 2px 2px 1px gray;
  border: 0 solid gray;
  margin-bottom: 10px;
}
</style>
