<template>
    <div>
        <custom-navbar/>
        <div class="d-flex justify-content-center align-items-center my-5 py-5">
            <table class="table w-50 border-2 shadow">
                <tr>
                    <th>
                        Manufacturer id
                    </th>
                    <th>
                        Manufacturer name
                    </th>
                    <th>
                        Delete
                    </th>
                    <th>
                        Edit
                    </th>
                </tr>
                <tr v-for="manufacturer in manufacturers.data">
                    <td class="d-flex justify-content-center mt-2">
                        {{ manufacturer.id }}
                    </td>
                    <td>
                        {{ manufacturer.name }}
                    </td>
                    <td>
                        <Link :href="route('manufacturers.destroy', manufacturer.id)" method="DELETE"
                              class="btn bg-danger text-white mb-2">
                            Delete
                        </Link>
                    </td>
                    <td>
                        <Link :href="route('manufacturers.edit', manufacturer.id)"
                              class="btn bg-warning text-white mb-2">
                            Edit
                        </Link>
                    </td>
                </tr>
            </table>
            <Link :href="route('manufacturers.create')"
                  class="btn bg-primary text-white mb-2 ms-5">
                Add new manufacturer
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
        manufacturers: Array,
    }
}
</script>

<style scoped>

</style>
