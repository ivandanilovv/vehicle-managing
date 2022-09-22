<template>
    <div class="d-flex align-items-center justify-content-center py-5">
        <form @submit.prevent="submit">
            <input type="text" v-model="form.name">
            <button type="submit" class="btn btn-primary bg-primary ms-3">
                Submit
            </button>
        </form>
        <a onclick="history.back();return false;" class="btn btn-danger text-white ms-3">
            Back
        </a>
    </div>
</template>

<script>
export default {
    name: "Edit",
    props: {
        manufacturer: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.manufacturer.name,
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.put(route('manufacturers.update', this.manufacturer), this.form);
        }
    }
}
</script>

<style scoped>

</style>
