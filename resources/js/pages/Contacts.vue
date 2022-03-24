<template>
    <div>
        <h1>Contacts Page!</h1>

        <div v-if="!formSubmitted">
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label"
                    >Nome / Cognome</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput2"
                    placeholder="Mario Rossi"
                    v-model="formData.name"
                />
                <span class="text-danger"> </span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                    >Indirizzo Email</label
                >
                <input
                    type="email"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="name@example.com"
                    v-model="formData.email"
                />
                <span class="text-danger"> </span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"
                    >Messaggio</label
                >
                <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    v-model="formData.message"
                ></textarea>
                <span class="text-danger"> </span>
            </div>

            <div>
                <button
                    type="submit"
                    class="btn btn-primary"
                    @click="formSubmit"
                >
                    Invia!
                </button>
            </div>
        </div>

        <div v-else class="alert alert-success py-5">
            <h4>Grazie per averci contattato</h4>
            <p class="lead">La sua richiesta è stata inviata correttamente</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            formData: {
                name: "",
                email: "",
                message: "",
            },
            formSubmitted: false,
        };
    },
    methods: {
        async formSubmit() {
            try {
                const resp = await axios.post("/api/contacts", this.formData);

                this.formSubmitted = true;
            } catch (er) {
                alert("Errore nell'invio della richiesta");
            }
        },
    },
};
</script>

<style lang="scss" scoped></style>
