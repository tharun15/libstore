<template>
    <div class="libstoreContainer">
        <div class="heading">
            <h2 id="title">Lib Store</h2>
            <add-book-form
                 v-on:reloadlist="getList()"
            />
        </div>
        <list-view :books="books"
                    v-on:reloadlist="getList()" />
    </div>
</template>
<script>
import addBookForm from "./addBookForm.vue"
import listView from "./listView"
export default {
    components: {
        addBookForm,
        listView
    },
    data: function () {
        return {
            books : []
        }
    },
    methods: {
        getList () {
            axios.get('api/books')
            .then( response => {
                this.books = response.data
            })
            .catch( error => {
                console.log( error );
            })
        }
    },
    created() {
        this.getList();
    }
    
}
</script>

<style scoped>
.libstoreContainer {
    width: 350px;
    margin: auto;
}

.heading {
    background: #e6e6e6;
    padding: 10px;
}

#title {
    text-align: center;
}
</style>