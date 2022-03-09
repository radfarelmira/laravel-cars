<template>
    <div>
        
        <section>
            <div class="container">
                <Cars />
            </div>
        </section>
    </div>
</template>

<script>

import Cars from '../components/Cars.vue'

export default {
    name: 'Home',
    components: {
        Cars
    }
}
</script>