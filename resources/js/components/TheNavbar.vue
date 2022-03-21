<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <!-- Left Side Of Navbar -->
            <a class="navbar-brand" href="/">Laravel Blog</a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-bs-controls="navbarSupportedContent"
                aria-bs-expanded="false"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/login"> Admin </a>
                    </li>
                    <li
                        class="nav-item active"
                        v-for="route in routes"
                        :key="route.path"
                    >
                        <router-link
                            class="nav-link"
                            :to="!route.path ? '/' : route.path"
                        >
                            {{ route.meta.linkText }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            routes: [],
        };
    },
    mounted() {
        this.routes = this.$router
            .getRoutes()
            .filter((el) => el.meta.linkText !== undefined);
    },
};
</script>

<style lang="scss" scoped></style>
