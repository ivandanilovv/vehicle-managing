<template>
    <div class="d-flex justify-content-center py-5 mt-5">
        <form @submit.prevent="submit">
            <input type="text" id="name" v-model="form.name" placeholder="Enter manufacturer name">
            <button type="submit" class="btn bg-success text-white ms-5">
                Submit
            </button>
            <a onclick="history.back();return false;" class="btn btn-danger text-white ms-3">
                Back
            </a>
        </form>
    </div>
</template>

<script>
export default {
    name: "Create",
    data() {
        return {
            form: this.$inertia.form({
                name: '',
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('manufacturers.store'), this.form);
        }
    }
}
</script>

<style scoped>

</style>
