<template>
    <div class="d-flex justify-content-center py-5 mt-5 bg-light">
        <form @submit.prevent="submit">
            <label for="number">
                Edit chassis number
            </label><br/>
            <input type="text" id="number" v-model="form.number"><br/>
            <label for="title">
                Edit title
            </label><br/>
            <input type="text" id="title" v-model="form.title"><br/>
            <label for="description">
                Edit description
            </label><br/>
            <input type="text" id="description" v-model="form.description"><br/>
            <label for="image_src">
                Edit image source
            </label><br/>
            <input type="text" id="image_src" v-model="form.image_src"><br/>
            <button type="submit" class="btn bg-primary text-white ms-4 mt-3">
                Submit
            </button>
            <a onclick="history.back();return false;" class="btn btn-danger text-white ms-3 mt-3">
                Back
            </a>
        </form>
    </div>
</template>

<script>
export default {
    name: "Edit",
    props: {
        vehicle: String,
    },
    data() {
        return {
            form: this.$inertia.form({
                number: this.vehicle.number,
                title: this.vehicle.title,
                description: this.vehicle.description,
                image_src: this.vehicle.image_src,
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.put(route('vehicles.update', this.vehicle), this.form);
        }
    }
}
</script>

<style scoped>

</style>
