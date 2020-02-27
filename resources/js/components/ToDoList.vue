<template>
    <div>
        <div class="full-control">
            <form action="" @submit.prevent="createPost(input)">
                <md-field>
                    <label>Initial Value</label>
                    <md-input v-model="input"></md-input>
                    <md-button type="submit" class="md-raised md-primary">Add</md-button>
                </md-field>
                <md-list v-if="this.posts">
                    <md-subheader>To-Do List</md-subheader>
                    <md-list-item v-for="(post, index) in this.posts" :key="index">
                        <md-checkbox v-model="list" :value="post.id" />
                        <span class="md-list-item-text">{{ post.content }}</span>
                    </md-list-item>
                </md-list>
            </form>
        </div>
<!--        <div class="c-to-do-list">-->
<!--            <template v-if="getAllToDoLists">-->
<!--                <div v-for="(post, index) in getAllToDoLists" :key="index" class="c-card">-->
<!--                    <p>{{ post.title}}</p>-->
<!--                    <p>{{ post.content}}</p>-->
<!--                    <button @click="deletePost(post.id)">DELETE [X]</button>-->
<!--                </div>-->
<!--            </template>-->
<!--        </div>-->
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
            this.$store.dispatch('fetchPosts')
        },
        methods: {
            createPost(post) {
                this.$store.dispatch('createPost', {input: post})
                this.$store.dispatch('fetchPosts')
            },
            deletePost(post) {
                this.$store.dispatch('deletePost',post)
            }
        },
        computed: {
            getAllToDoLists() {
                if (this.posts && this.posts.length > 0) {
                    return this.posts;
                }
                return undefined;
            },
            ...mapGetters([
                'posts'
            ])
        }
    }

</script>
