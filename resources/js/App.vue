<template>
    <div class="container-fluid">
        <notifications position="top right"/>
        <b-card header="List of Form Entries"
                header-tag="header"
                border-variant="primary"
                header-bg-variant="primary"
                header-text-variant="white"
        >

            <b-row>
                <div>
                    <b-btn variant="success" @click="openModal()">Create a dynamic form</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modalPrevent"
                             v-model="modal"
                             :title="modalInfo.title"
                             ok-only ok-variant="secondary" ok-title="Cancel"
                             size="lg"
                    >
                        <dynamic-form-generator @created="addedNewItem($event)" :exFormData="formData" :entryId="formEntryId"
                                                :exFormSchema="formSchema"></dynamic-form-generator>
                    </b-modal>
                </div>
            </b-row>
            <br>

            <!-- Main table element -->
            <b-table show-empty
                     stacked="md"
                     :items="items"
                     :fields="fields"
            >
                <template slot="name" slot-scope="row">{{row.value.first}} {{row.value.last}}</template>
                <template slot="isActive" slot-scope="row">{{row.value?'Yes :)':'No :('}}</template>
                <template slot="actions" slot-scope="row">
                    <!-- We use @click.stop here to prevent a 'row-clicked' event from also happening -->
                    <b-button size="sm" @click.stop="info(row.item, row.index, $event.target)" class="mr-1">
                        Edit
                    </b-button>
                    <b-button size="sm" @click.stop="row.toggleDetails">
                        Details
                    </b-button>
                </template>
                <template slot="row-details" slot-scope="row">
                    <b-card>
                        <ul>
                            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value}}</li>
                        </ul>
                    </b-card>
                </template>
            </b-table>

        </b-card>


    </div>
</template>

<script>
    import DynamicFormGenerator from './components/DynamicFormGenerator';

    export default {
        components: {
            DynamicFormGenerator,
        },
        watch: {},
        data() {
            return {
                modal: false,
                formEntryId:null,
                formData: {},
                formSchema: {},
                show: true,
                form: {},
                name: '',
                names: [],
                purchaseOrders: [],
                items: [],
                fields: [
                    {key: 'id', label: 'ID', sortable: true, sortDirection: 'desc'},
                    {key: 'json_schema.title', label: 'Form Name'},
                    {key: 'actions', label: 'Actions', 'class': 'action-wrap'}
                ],
                modalInfo: {title: '', content: ''}
            }
        },
        computed: {
        },
        methods: {
            addedNewItem($event) {
                this.items.push($event);
                this.modal = false;
            },
            getItems() {
                let app = this;
                axios.get('web/dynamicform/form-entries')
                    .then(function (response) {
                        console.log(response);
                        app.items = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            info(item, index, button) {
                this.modalInfo.title = 'Edit Item: ' + '#' + item.id;
                this.formSchema = item.json_schema;
                this.formData = item.form_data;
                this.formEntryId = item.id;
                this.modal = true;
            },
            openModal() {
                this.formEntryId = null;
                this.formSchema = {};
                this.formData = {};
                this.modalInfo.title = 'Create a Dynamic Form';
                this.modal = true;
            }
        },
        created() {
            this.getItems();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
