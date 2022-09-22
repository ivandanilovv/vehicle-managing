<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="nav-link disabled fs-4 text-primary" href="#">Vehicle system</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ms-3">
                            <a class="nav-link fs-4 text-success" aria-current="page"
                               href="http://127.0.0.1:8000/manufacturers">
                                Manufacturers
                            </a>
                        </li>
                        <li class="nav-item fs-4 text-primary ms-3">
                            <a class="nav-link text-success" href="http://127.0.0.1:8000/models">Models</a>
                        </li>
                        <li class="nav-item fs-4 text-primary ms-3">
                            <a class="nav-link text-success" href="#">Vehicles</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: "CustomNavbar"
}
</script>

<style scoped>

</style>
