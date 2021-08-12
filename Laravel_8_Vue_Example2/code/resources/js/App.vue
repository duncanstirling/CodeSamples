<template>
    <div class="container"> 
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Laravel Vue CRUD Example - Duncan Stirling learning excersize</span>
        </div>	
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Products List</router-link>
                    <router-link to="/create" class="nav-item nav-link">Create Product</router-link>
                </div>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>