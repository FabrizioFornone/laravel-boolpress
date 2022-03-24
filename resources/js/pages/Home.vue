<template>
    <div>
        <div class="row flex-wrap mb-4">
            <PostCard
                class="col-6 col-md-4 col-lg-3 col-xxl-2 my-3"
                v-for="post of posts"
                :key="post.id"
                :postProp="post"
            >
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
            user: null,
        };
    },

    methods: {
        fetchPosts() {
            axios.get("/api/posts").then((res) => {
                this.posts = res.data;
            });
        },
        getStoredUser() {
            const storedUser = localStorage.getItem("user");

            if (storedUser) {
                this.user = JSON.parse(storedUser);
            } else {
                this.user = null;
            }
        },
    },
    mounted() {
        this.fetchPosts();

        this.getStoredUser();

        window.addEventListener("storedUserChanged", () => {
            // ogni volta che cambia l'utente, aggiorniamo la variabile locale.
            this.getStoredUser();

        });
    },
};
</script>

<style lang="scss" scoped></style>
