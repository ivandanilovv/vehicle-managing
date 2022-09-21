<template>
    <div class="d-flex justify-content-center align-items-center my-5 py-5">
        <table class="table w-50 border-2 shadow">
            <tr>
                <th>
                    Model id
                </th>
                <th>
                    Model name
                </th>
                <th>
                    Delete
                </th>
                <th>
                    Edit
                </th>
            </tr>
            <tr v-for="model in models.data">
                <td class="d-flex justify-content-center mt-2">
                    {{ model.id }}
                </td>
                <td>
                    {{ model.name }}
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
</template>

<script>
export default {
    name: "Index",
    props: {
        models: Array,
    }
}
</script>

<style scoped>

</style>
