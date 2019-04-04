<template>
    <div class="form-group">
        <label :for="field.name">{{ field.label }}</label>

        <textarea class="form-control" v-model="data.value" :id="field.name" rows="3"> </textarea>
    </div>
</template>

<script>
    export default {
        props: {
            field: {required: true},
            data: {required: true}
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
