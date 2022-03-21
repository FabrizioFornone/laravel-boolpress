<template>
    <div class="col-4">
        <div class="card">
            <img :src="postImage(postProp)" alt="" />
            <div class="card-body">
                <h5 class="card-title">{{ postProp.title }}</h5>
                <div class="py-2">
                    {{ postProp.content }}
                </div>
                <div class="py-2">Author: {{ postProp.user.name }}</div>
                <strong v-if="postProp.category">
                    {{ postProp.category.code }}
                </strong>
                <div class="py-2">
                     <router-link :to="{ name:'posts.show', params: { post: postProp.id } }"> Details </router-link>
                </div>
            </div>
        </div>
    </div>
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
