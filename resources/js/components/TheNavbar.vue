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

            <div
                class="collapse navbar-collapse justify-content-end"
                id="navbarSupportedContent"
            >
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
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
                    <li class="nav-item active" v-if="user">
                        <a class="nav-link" href="/admin">
                            {{ user.name.toUpperCase() }}
                        </a>
                        <a class="nav-link" href="#" @click="logoutMethod"
                            >Logout</a
                        >
                    </li>
                    <li class="nav-item active" v-if="!user">
                        <a class="nav-link" href="/login"> Login </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            routes: [],
            user: null,
        };
    },
    methods: {
        fetchUser() {
            axios
                .get("/api/user")
                .then((resp) => {
                    this.user = resp.data;

                    localStorage.setItem("user", JSON.stringify(resp.data));

                    window.dispatchEvent(new CustomEvent("storedUserChanged"));
                })
                .catch((er) => {
                    console.error("Utente non loggato");

                    localStorage.removeItem("user");

                    window.dispatchEvent(new CustomEvent("storedUserChanged"));
                });
        },
        logoutMethod() {
            axios.post("/logout").then((resp) => {

                this.user = null;

                localStorage.removeItem("user");

                window.dispatchEvent(new CustomEvent("storedUserChanged"));
            });
        },
    },
    mounted() {
        this.routes = this.$router
            .getRoutes()
            .filter((el) => el.meta.linkText !== undefined);
        this.fetchUser();
    },
};
</script>

<style lang="scss" scoped></style>
