<template>
    <div class="container-fluid">

        <div class="row">

            <div v-if="entryId===null" class="col-5">
                <textarea class="form-control" rows="30" v-model="jsonSchemaDump"> </textarea>
            </div>
            <div v-if="entryId===null" class="col-1">
                <div class="box h-100 d-flex justify-content-center flex-column">
                    <button @click="convertSchema()" type="button" class="btn btn-dark align-middle"> =></button>
                </div>
            </div>

            <!--<div class="row">-->
            <!--<div class="col-sm">-->
            <!--<dynamic-form :schema="formSchema" :data="formData"></dynamic-form>-->
            <!--</div>-->
            <!--</div>-->
            <div class="row">
                <div class="col-6 col-sm-11">
                    <div class="card">


                        <form @submit.prevent="submit">

                            <div class="card-body">
                                <h5 class="card-title">{{this.formSchema.title}}</h5>
                                <dynamic-form :schema="formSchema" :data="formData"></dynamic-form>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>

                <br>
                <div class="col-6 col-sm-11">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Data Preview</h5>

                            <pre>
                                {{JSON.stringify(this.formData, null, 2)}}
                            </pre>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import DynamicForm from './DynamicForm';

    export default {
        components: {
            DynamicForm,
        },
        props: {
            entryId: {},
            exFormSchema: {},
            exFormData: {}
        },
        data() {
            return {

                jsonSchemaDump: {},
                formSchema: {

                },
                defaultSchema:{
                    title: 'New Form',
                    fields: [
                        {
                            type: 'text-input',
                            name: 'first_name',
                            label: 'First name',
                            placeholder: ''
                        },
                        {
                            type: 'text-input',
                            name: 'last_name',
                            label: 'Last name',
                            placeholder: ''
                        },
                        {
                            type: 'textarea-input',
                            name: 'description',
                            label: 'Description',
                            placeholder: ''
                        },
                        {
                            type: 'file-input',
                            name: 'file',
                            label: 'File',
                            placeholder: ''
                        }
                    ]
                },
                formData: {}
            }
        },
        watch: {
            entryId(newValue, oldValue) {

                if (newValue !== null) {
                    this.formSchema = JSON.parse(JSON.stringify(this.exFormSchema));
                    this.formData = JSON.parse(JSON.stringify(this.exFormData));
                }else{
                    this.formSchema = JSON.parse(JSON.stringify(this.defaultSchema));
                    this.initFormData();
                }
            }
        },
        methods: {
            bindValue($event) {
                this.formSchema = JSON.parse($event.target.value);
            },
            checkData() {
                if (Object.keys(this.exFormSchema).length !== 0) {
                    this.formSchema = JSON.parse(JSON.stringify(this.exFormSchema));
                }
            },
            initFormData() {

                this.formData = this.formSchema.fields.reduce(function (map, obj) { // use reduce to generate a new map
                    map[obj.name] = {};
                    map[obj.name]['value'] = '';
                    return map;
                }, {});
            },
            convertSchema() {
                this.formSchema = JSON.parse(this.jsonSchemaDump);
                this.initFormData();
                console.log(this.formSchema);
            },
            submit(evt) {
                evt.preventDefault();

                if (this.entryId === null) {
                    console.log('create');
                    this.create();
                }else{
                    console.log('update');
                    this.update();
                }

            },
            create() {
                let app = this;
                console.log('create');
                console.log(this.formData);
                console.log('creat1e');
                axios.post('web/dynamicform/form-entries', {
                    form_schema: this.formSchema,
                    form_data: this.formData
                })
                    .then(function (response) {
                        console.log(response);
                        // app.items = response.data;
                        app.$notify({
                            type: 'success',
                            title: 'SUCCESS',
                            text: 'Form Added!'
                        });
                        app.$emit('created', response.data)

                    })
                    .catch(function (error) {
                        app.$notify({
                            type: 'error',
                            title: 'ERROR',
                            text: 'Please ensure your schema is correct and also please click the convert button before submit.'
                        });
                        console.log(error);
                    });
            },
            update() {
                let app = this;
                axios.put('web/dynamicform/form-entries/' + this.entryId, {
                    form_schema: this.formSchema,
                    form_data: this.formData
                })
                    .then(function (response) {
                        console.log(response);
                        // app.items = response.data;
                        app.$notify({
                            type: 'success',
                            title: 'SUCCESS',
                            text: 'Form Updated!'
                        });
                        app.$emit('updated', response.data)

                    })
                    .catch(function (error) {
                        app.$notify({
                            type: 'error',
                            title: 'ERROR',
                            text: 'Please ensure your schema is correct and also please click the convert button before submit.'
                        });
                        console.log(error);
                    });
            }
        },
        created() {
            this.formSchema = JSON.parse(JSON.stringify(this.defaultSchema));
            this.checkData();
            this.initFormData();
            this.jsonSchemaDump = JSON.stringify(this.formSchema, null, 2);
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    .modal-lg {
        max-width: 80%;
    }
</style>
