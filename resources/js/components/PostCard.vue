<template>
    <section>
        <div class="card-box my-3">
            <img :src="postImage(postProp)" alt="" />
            <div class="card-body">
                <h5 class="card-title">{{ postProp.title }}</h5>
                <div class="py-1">
                    {{ postProp.content }}
                </div>
                <div class="py-1">
                    <span>Author: </span> {{ postProp.user.name }}
                </div>
                <div v-if="postProp.category">
                    <span>Category: </span> {{ postProp.category.code }}
                </div>
                <div class="py-1">
                    <router-link
                        :to="{
                            name: 'posts.show',
                            params: { post: postProp.id },
                        }"
                    >
                        Details
                    </router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        postProp: Object,
    },
    methods: {
        postImage(post) {
            return (
                post.image ??
                "https://www.logistec.com/wp-content/uploads/2017/12/placeholder.png"
            );
        },
    },
};
</script>
