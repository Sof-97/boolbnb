<template>
    <div>
        <h1 class="error">404: Pagina non trovata</h1>
    </div>
</template>

<script>
export default {
    name:"NotFoundPage"
}
</script>
<style lang="scss" scoped>
.error{
    font-size: 3rem;
    text-align: center;
    color: #ff385c;
    padding: 0 20px;
}
@media screen and (max-width: 400px) {
    .error{
        font-size: 1.5rem;
    }
}
</style>