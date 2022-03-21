<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="/">Laravel Boolpress</a>

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

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ms-auto"></ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login"> Admin </a>
                    </li>
                    <li
                        class="nav-item"
                        v-for="route in routes"
                        :key="route.path"
                    >
                        <router-link class="nav-link" :to="route.path">
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
        console.log(this.$router.getRoutes());

        this.routes = this.$router.getRoutes();
    },
};
</script>

<style lang="scss" scoped></style>
