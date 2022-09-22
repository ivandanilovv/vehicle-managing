<template>
    <div>
        <custom-navbar/>
        <br/><br/>
        <div class="d-flex justify-content-center align-items-center my-5 py-5">
            <table class="table w-50 border-2 shadow">
                <tr class="border-b-2">
                    <th>
                        Model id
                    </th>
                    <th v-for="manufacturer in manufacturers">
                        {{ manufacturer.name }}
                    </th>
                    <th>
                        Delete
                    </th>
                    <th>
                        Edit
                    </th>
                </tr>
                <tr v-for="model in models.data" class="border-b-2">
                    <td class="d-flex justify-content-center mt-2">
                        {{ model.id }}
                    </td>
                    <td v-for="manufacturer in manufacturers">
                    <span v-if="model.manufacturer_id===manufacturer.id"
                          class="d-flex justify-content-center align-items-center">
                        {{ model.name }}
                    </span>
                    </td>
                    <td>
                        <Link :href="route('models.destroy', model.id)" method="DELETE"
                              class="btn bg-danger text-white mb-2">
                            Delete
                        </Link>
                    </td>
                    <td>
                        <Link :href="route('models.edit', model.id)"
                              class="btn bg-warning text-white mb-2">
                            Edit
                        </Link>
                    </td>
                </tr>
            </table>
            <Link :href="route('models.create')"
                  class="btn bg-primary text-white mb-2 ms-5">
                Add new model
            </Link>
        </div>
    </div>
</template>

<script>
import CustomNavbar from "../../Components/CustomNavbar.vue";

export default {
    name: "Index",
    components: {CustomNavbar},
    props: {
        models: Array,
        manufacturers: Array,
    },
}
</script>

<style scoped>
.table > :not(caption) > * > * {
    border-bottom-width: 0;
}
</style>
