<template>
    <div class="container">
        <custom-navbar/>
        <div class="row d-flex justify-content-center align-items-center py-5">
            <Link :href="route('vehicles.create')"
                  class="btn bg-primary text-white mb-2 ms-5 w-25">
                Add new vehicle
            </Link>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-3 d-flex justify-content-center align-items-top shadow m-2 p-3"
                 v-for="vehicle in vehicles">
                <div class="d-flex flex-column align-items-center justify-content-top" style="width: 18rem;">
                    <img :src="vehicle.image_src" class="card-img-top" alt="Image" style="height: 200px;">
                    <div class="card-body d-flex flex-column align-items-center justify-content-top">
                        <h1 class="card-title fs-2 fw-bold">{{ vehicle.title }}</h1>
                        <p class="fs-5">
                            Manufacturer:
                            <span class="fw-bold">
                                {{ manufacturerName(manufacturerId(vehicle.model_id)) }}
                            </span>
                        </p>
                        <p class="fs-5">
                            Model:
                            <span class="fw-bold">
                                {{ modelName(vehicle.model_id) }}
                            </span>
                        </p>
                        <p class="card-text fs-5">
                            {{ vehicle.description }}
                        </p>
                        <div class="mt-3">
                            <Link :href="route('vehicles.destroy', vehicle.id)" method="DELETE"
                                  class="btn bg-danger text-white mb-2 me-3">
                                Delete
                            </Link>
                            <Link :href="route('vehicles.edit', vehicle.id)"
                                  class="btn bg-warning text-white mb-2 px-3">
                                Edit
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CustomNavbar from "../../Components/CustomNavbar.vue";

export default {
    name: "Index",
    components: {CustomNavbar},
    props: {
        vehicles: Array,
        models: Array,
        manufacturers: Array,
    },
    data() {
        return {}
    },
    methods: {
        modelName(model_id) {
            for (let i = 0; i < this.models.length; i++) {
                if (this.models[i].id === model_id)
                    return this.models[i].name;
            }
        },

        manufacturerId(model_id) {
            for (let i = 0; i < this.models.length; i++) {
                if (this.models[i].id === model_id)
                    return this.models[i].manufacturer_id;
            }
        },

        manufacturerName(manufacturer_id) {
            for (let i = 0; i < this.manufacturers.length; i++) {
                if (this.manufacturers[i].id === manufacturer_id)
                    return this.manufacturers[i].name;
            }
        }
    }
}
</script>

<style scoped>

</style>
