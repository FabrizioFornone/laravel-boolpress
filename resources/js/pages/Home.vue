<template>
    <div>
        <h1 class="py-4">LaravelBlog</h1>

        <div class="row">
            <PostCard v-for="post of posts" :key="post.id" :postProp="post">
            </PostCard>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import PostCard from "../components/PostCard.vue";

export default {
    components: { PostCard },

    data() {
        return {
            posts: [],
        };
    },

    methods: {
        fetchPosts() {
            axios.get("/api/posts").then((res) => {
                this.posts = res.data;
                console.log(res.data);
            });
        },
    },
    mounted() {
        this.fetchPosts();
    },
};
</script>

<style lang="scss" scoped></style>
