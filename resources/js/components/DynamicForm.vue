<template>
    <div>

        <template v-for="field in schema.fields">
            <component :is="field.type" :field="field" :data.sync="data[field.name]"></component>
        </template>

    </div>
</template>

<script>

    import TextInput from './widgets/TextInput';
    import TextareaInput from './widgets/TextareaInput';
    import FileInput from './widgets/FileInput';

    export default {
        components: {
            TextInput,
            TextareaInput,
            FileInput
        },
        props: {
            schema: {required: true},
            data: {required: true}
        }
    }
</script>
