<template>
    <div>
        <h1>{{ post.title }}</h1>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            post: {},
        };
    },
    methods: {
        async fetchPost() {
            const resp = await axios.get(
                "/api/posts/" + this.$route.params.post
            );

            this.post = resp.data;
        },
    },
    mounted() {
        this.fetchPost();
    },
};
</script>

<style lang="scss" scoped></style>
