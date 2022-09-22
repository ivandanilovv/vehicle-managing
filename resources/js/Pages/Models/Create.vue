<template>
    <div class="d-flex justify-content-center py-5 mt-5">
        <form @submit.prevent="submit">
            <label for="sel1">
                Select manufacturer:
            </label>
            <select class="form-control" id="sel1" v-model="form.manufacturer_id">
                <option v-for="item in manufacturers" :value="item.id">
                    {{ item.name }}
                </option>
            </select>
            <input class="mt-3" type="text" id="name" v-model="form.name" placeholder="Enter model name"><br/>
            <button type="submit" class="btn bg-success text-white ms-4 mt-3">
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
    name: "Create",
    props: {
        manufacturers: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                manufacturer_id: null,
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('models.store'), this.form);
        }
    }
}
</script>

<style scoped>

</style>
