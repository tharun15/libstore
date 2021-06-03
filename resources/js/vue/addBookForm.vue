<template>
    <div class="addBook">
        <input type="text" v-model="book.book_name"/>
        <font-awesome-icon
            icon = "plus-square"
            @click="addBook()"
            :class="[ book.book_name ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                book: {
                    book_name: ""
                }
            }
        },
        methods: {
            addBook() {
                if( this.book.book_name == '') {
                    return;
                }
                axios.post('api/book/store', {
                    book: this.book
                })
                .then( response => {
                    if( response.status == 201) {
                        this.book.book_name = "";
                        this.$emit('reloadlist')
                    }
                })
                .catch(error => {
                    console.log(error);
                })
            }
        }
    }
</script>


<style scoped>
.addBook {
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    background: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%
}
.plus {
    font-size: 20px;
}

.active {
    color: #00CE25;
}
.inactive {
    color: #999999;
}

</style>