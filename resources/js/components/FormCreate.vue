<template>
    <div class="container">
        <form method="POST"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Titolo appartamento</label>
                <input type="text" class="form-control" id="title" placeholder="Titolo dell'appartamento">
            </div>
            <div class="form-group">
                <label for="description">Descrizione appartamento</label>
                <textarea type="text" rows="5" class="form-control" id="description" placeholder="Descrizione appartamento"></textarea>
            </div>
            <div class="form-group">
                <label for="address">Indirizzo:</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Inizia a scrivere un indirizzo...">
            </div>
            <div class="form-group">
                <label for="dropdown">Dropdown:</label>
                <select id="dropdown">

                </select>
            </div>
            <div class="form-group">
                <label for="cover_image">Immagine di copertina:</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control">
            </div>
            <div class="form-group">
                <label for="rooms">N° di stanze</label>
                <input class="form-control" type="number" name="rooms" id="rooms" min="0">
            </div>
            <div class="form-group">
                <label for="beds">N° di letti</label>
                <input class="form-control" type="number" name="beds" id="beds" min="0">
            </div>
            <div class="form-group">
                <label for="bathrooms">N° di bagni</label>
                <input class="form-control" type="number" name="bathrooms" id="bathrooms" min="0">
            </div>
            <div class="form-group">
                <label for="is_visible">L'appartamento è visibile</label>
                <input type="radio" name="is_visible" id="is_visible">SI
                <input type="radio" name="is_visible" id="is_visible">NO
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        
    }
</script>
