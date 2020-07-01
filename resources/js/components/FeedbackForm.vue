<template>
    <v-row>
        <v-col cols="12" offset="4" xl="4">
            <v-form ref="form" v-model="valid">
                <v-text-field
                    v-model="form.name"
                    :rules="rules.nameRules"
                    label="Имя"
                    required
                ></v-text-field>

                <v-text-field
                    v-model="form.phone"
                    :rules="rules.phoneRules"
                    label="Телефон"
                    required
                    class="mb-4"
                ></v-text-field>
                <v-textarea
                    v-model="form.body"
                    :rules="rules.bodyRules"
                    label="Обращение"
                    required
                    :outlined="true"
                ></v-textarea>

                <v-btn
                    :disabled="!valid"
                    color="success"
                    class="mr-4"
                    @click="onSubmit()"
                >
                    Отправить
                </v-btn>
            </v-form>
            <v-dialog v-model="alert.showSuccess" width="400">
                <v-alert type="success" transition="scale-transition" prominent>
                    <div
                        class="d-flex align-center justify-space-between white--text"
                    >
                        Обращение отправлено!
                        <v-btn
                            icon
                            @click="alert.showSuccess = false"
                            class="ml-4"
                        >
                            <v-icon color="white">mdi-close</v-icon>
                        </v-btn>
                    </div>
                </v-alert>
            </v-dialog>
            <v-dialog v-model="alert.showAlert" width="400">
                <v-alert type="alert" transition="scale-transition" prominent>
                    <div
                        class="d-flex align-center justify-space-between white--text"
                    >
                        Что-то пошло не так!
                        <v-btn
                            icon
                            @click="alert.showSuccess = false"
                            class="ml-4"
                        >
                            <v-icon color="white">mdi-close</v-icon>
                        </v-btn>
                    </div>
                </v-alert>
            </v-dialog>
        </v-col>
    </v-row>
</template>

<script>
export default {
    data: () => ({
        valid: true,
        form: {
            name: "",
            phone: "",
            body: ""
        },
        rules: {
            nameRules: [v => !!v || "Обязательное поле"],
            phoneRules: [
                v => !!v || "Обязательное поле",
                v => /^[0-9]$/.test(v) || "Телефон состоит только из цифр"
            ],
            bodyRules: [v => !!v || "Обязательное поле"]
        },
        alert: {
            showSuccess: false,
            showAlert: false
        }
    }),
    methods: {
        validate() {
            this.$refs.form.validate();
        },
        reset() {
            this.$refs.form.reset();
        },
        async onSubmit() {
            await fetch(`${process.env.MIX_APP_URL}/api/feedback/save`, {
                method: "POST",
                body: JSON.stringify(this.form),
                headers: {
                    "Content-Type": "application/json"
                }
            })
                .then(response => {
                    if (response.status === 200) {
                        this.alert.showSuccess = true;
                        thus.reset();
                        return;
                    }
                    this.alert.showAlert = true;
                })
                .catch(err => {
                    this.alert.showAlert = true;
                });
        }
    }
};
</script>
