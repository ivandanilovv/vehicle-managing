<template>
    <div class="d-flex align-items-center justify-content-center py-5 mt-5">
        <form @submit.prevent="submit">
            <label for="name" class="fs-4 fw-bold d-flex align-items-center justify-content-center">
                Edit the model:
            </label><br/>
            <input type="text" id="name" v-model="form.name">
            <br/><br/>
            <button type="submit" class="btn bg-primary text-white ms-4">
                Submit
            </button>
            <a href="http://127.0.0.1:8000/models" class="btn btn-danger text-white ms-3">
                Cancel
            </a>
        </form>
    </div>
</template>

<script>
export default {
    name: "Edit",
    props: {
        model: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.model.name,
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.put(route('models.update', this.model), this.form);
        }
    }
}
</script>

<style scoped>

</style>
