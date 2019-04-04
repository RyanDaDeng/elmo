<template>
    <div class="form-group">
        <label :for="field.name">{{ field.label }}</label>
        <input type="file" class="form-control-file"  :id="field.name" v-on:change="onFileChange($event)">
    </div>

</template>

<script>
    export default {
        props: {
            field: {required: true},
            data: {required: true}
        },
        data() {
            return {
                file: ''
            }
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
               this.data.value = files[0];

               let formData = new FormData;
               formData.append('file',this.data.value,'file');
                axios.patch( 'web/dynamicform/form-entries/file',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function(){
                    console.log('SUCCESS!!');
                })
                    .catch(function(){
                        console.log('FAILURE!!');
                    });


               console.log(this.data.value)
            },
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>
