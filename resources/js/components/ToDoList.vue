<template>
    <div>
        <div class="c-to-do-list__form">

        </div>
        <div class="c-to-do-list">
            <template v-if="getAllToDoLists">
                <div v-for="(post, index) in getAllToDoLists" :key="index" class="c-card">
                    <p>{{ post.title}}</p>
                    <p>{{ post.content}}</p>
                    <button @click="deletePost(post.id)">DELETE [X]</button>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        mounted() {
            this.$store.dispatch('fetchPosts')
        },
        methods: {
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
