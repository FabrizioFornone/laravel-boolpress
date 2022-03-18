<template>
    <div class="col">
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
