<template>
    <div class="d-flex justify-content-center py-5 mt-5 bg-light">
        <form @submit.prevent="submit">
            <label for="sel1">
                Choose manufacturer
            </label><br/>
            <select class="form-control" id="sel1" v-model="manufacturer_id">
                <option v-for="item in manufacturers" :value="item.models">
                    {{ item.name }}
                </option>
            </select>
            <label for="sel2">
                Choose model
            </label><br/>
            <select class="form-control" id="sel2" v-model="form.model_id">
                <option v-for="item in manufacturer_id" :value="item.id">
                    <span>
                        {{item.name}}
                    </span>
                </option>
            </select>

            <label for="number">
                Enter chassis number
            </label><br/>
            <input type="text" id="number"  placeholder="Chassis number" class="mb-3" v-model="form.number"><br/>
            <label for="title">
                Enter title
            </label><br/>
            <input type="text" id="title"  placeholder="Title" class="mb-3" v-model="form.title"><br/>
            <label for="description">
                Enter description
            </label><br/>
            <input type="text" id="description" placeholder="Description" class="mb-3" v-model="form.description"><br/>
            <label for="image">
                Enter image link
            </label><br/>
            <input type="text" id="image" placeholder="Image link" class="mb-3" v-model="form.image_src"><br/>
            <button type="submit" class="btn bg-primary text-white ms-3">
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
    props: {
        models: Array,
        manufacturers: Array,
    },
    data() {
        return {
            manufacturer_id: '',
            form: this.$inertia.form({
                number: '',
                title: '',
                description: '',
                image_src: '',
                model_id: '',
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('vehicles.store'), this.form);
        }
    }
}
</script>

<style scoped>

</style>
