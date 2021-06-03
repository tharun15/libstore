<template>
    <div class="book">
        <input
            type="checkbox"
            @change="updateCheck()"
            />
            <span :class="[book.completed ? 'completed' : '', 'bookText']">{{book.book_name}}</span>
            <button @click="removeBook()" class="trashcan">
                <font-awesome-icon icon="trash" />
            </button>
    </div>
</template>

<script>
    export default {
        props: ['book'],
        methods: {
            updateCheck() {
                axios.put('api/book/' + this.book.id, {
                    book: this.book
                })
                .then(response => {
                    if(response.status == 200) {
                        this.$emit('bookchanged');
                    }
                })
                .catch( error => {
                    console.log(error);
                })
            },
            removeBook() {
                axios.delete('api/book/' + this.book.id)
                .then( response => {
                    if( response.status == 200) {
                        this.$emit('bookchanged');
                    }
                })
                .catch( error => {
                    console.log(error);
                })
            }
        }
    }
</script>

<style scoped>
.completed {
    /*text-decoration: line-through;*/
    color: #999999;
}
.bookText {
    width: 100%;
    margin-left: 20px;
}

.book {
    display: flex;
    justify-content: center;
    align-items: center;
}

.trashcan {
    background: #e6e6e6;
    border: none;
    color: #FF0000;
    outline: none;
}

</style>