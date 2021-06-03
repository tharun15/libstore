<template>
    <div>
        <div v-for="(book, index) in books" :key="index" >
            <list-book
                :book="book"
                class="book"
                v-on:bookchanged="$emit('reloadlist')"
            />
        </div>
    </div>
</template>

<script>
import listBook from "./listBook"
import ListBook from "./listBook.vue"

export default {
    props: ['books'],
    components: {
        listBook
    }

}
</script>

<style scoped>
.book {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>