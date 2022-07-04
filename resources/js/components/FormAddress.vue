<template>
    <div class="form-group">
        <label for="address">Indirizzo</label>
        <input type="text" class="form-control" name="address" id="address" v-model="address">
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "FormAddress",
    data(){
        return{
            baseUrl: 'https://api.tomtom.com/search/2/search/',
            address: '',
            tokenSettings: '.json?key=igkbkqwR2f1uQStetPLGqvyGEGFKLvAA&language=it-IT&typeahead=true&limit=7',
            results: [],
        }
    },
    computed:{
        addressSearch: function(){
            axios.get(this.baseUrl + this.address + this.tokenSettings)
                .then(res=>{
                    this.results = res.data.results;    
                })
        }
    }
};
</script>
