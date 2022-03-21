<template>
    <div>
        <TheNavbar></TheNavbar>

        <div class="container my-5 py-5">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import TheNavbar from "../components/TheNavbar.vue";

export default {
    components: { TheNavbar },
};
</script>

<style lang="scss" scoped></style>
