<template>
    <div>
        <h1>App Page</h1>
        <div>
            <div v-for="el,i in apartments" :key="i" class="card ml-2 p-2" style="width: 18rem;">
                <img class="card-img-top" :src="`${el.cover_image}`" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{el.title}}</h5>
                    <p class="card-text">{{el.description}}</p>
                    <a href="#" class="btn btn-primary">Vai ad appartamento</a>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

    export default {
        name: "App",
        data(){
          return {
             apartments: null
          }
        },

        mounted() {
          this.GetApartments()
        },
        methods: {
            GetApartments(){
                axios.get("http://127.0.0.1:8000/api/apartments").then((res) => {this.apartments = res.data})
            }
             
             
            
        }
    }
</script>
