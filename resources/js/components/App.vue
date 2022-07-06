<template>
    <div>
        <h1>App Page</h1>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "App",
    mounted() {
        console.log("Apposteroni.");
    },
};
</script>
