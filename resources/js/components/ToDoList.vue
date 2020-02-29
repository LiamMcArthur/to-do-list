<template>
    <div>
        <div class="full-control">
            <form action="" @submit.prevent="createPost(input)">
                <md-field>
                    <label>Initial Value</label>
                    <md-input v-model="input"></md-input>
                    <md-button type="submit" class="md-raised md-primary">Add</md-button>
                </md-field>
                <md-list v-if="getAllToDoLists">
                    <md-subheader>To-Do List</md-subheader>
                    <md-list-item v-for="(post, index) in getAllToDoLists" :key="index">
                        <md-checkbox v-model="list" :value="post.id" />
                        <span class="md-list-item-text">{{ post.content }}</span>
                    </md-list-item>
                </md-list>
            </form>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        data() {
            return {
                input: '',
                list: []
            }
        },
        mounted() {
            this.$store.dispatch('fetchPosts');
            this.$store.dispatch('fetchChecked');

            axios.get('/to-do-list/get-checked')
                .then(res => {
                    this.list = res.data;
                }).catch(err => {
                console.log(err)
            })

        },
        methods: {
            createPost(post) {
                this.$store.dispatch('createPost', {input: post});
                this.$store.dispatch('fetchPosts');
            },
            deletePost(post) {
                this.$store.dispatch('deletePost', post);
            },
        },
        computed: {
            getAllToDoLists() {
                if (this.posts && this.posts.length > 0) {
                    return this.posts;
                }
                return undefined;
            },
            ...mapGetters([
                'posts',
                'checked'
            ])
        },
        watch: {
            list: function (ids) {
                if (ids && ids.length !== this.checked.length) {
                    this.$store.dispatch('updateChecked', {input: ids});
                }
            },
        }
    }

</script>
