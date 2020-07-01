<template>
    <v-app>
        <v-container>
            <v-alert type="success" :value="false">
                TestForm
            </v-alert>
            <feedback></feedback>
        </v-container>
    </v-app>
</template>

<script>
    import feedbackForm from './components/FeedbackForm';
    export default {
        name: "App",
        components: {
            'feedback' :feedbackForm
        }
    };
</script>
