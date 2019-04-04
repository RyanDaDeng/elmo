<template>
    <div class="form-control">
        <dynamic-form :schema="formSchema" :data="formData"></dynamic-form>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                formSchema: {
                    fields: [
                        {
                            type: 'text-input',
                            name: 'first_name',
                            label: 'First name',
                            placeholder: 'Enter first name'
                        },
                        {
                            type: 'text-input',
                            name: 'last_name',
                            label: 'Last name',
                            placeholder: 'Enter last name'
                        },
                        {
                            type: 'checkbox-input',
                            name: 'is_admin',
                            label: 'Administrator',
                            placeholder: 'Sure, why not'
                        }
                    ]
                },
                formData: {
                    first_name: {
                        value: 'John'
                    },
                    last_name: {
                        value: 'Doe'
                    },
                    is_admin: {
                        value: true
                    }
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
