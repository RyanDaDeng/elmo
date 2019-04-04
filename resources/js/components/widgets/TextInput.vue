<template>
    <div class="form-group">
        <label :for="field.name">{{ field.label }}</label>
        <input :id="field.name" class="form-control" type="text" :placeholder="field.placeholder" v-model="data.value" >
        <!--<b-form-input v-model="value.value" placeholder="Enter your name"></b-form-input>-->

    </div>

</template>

<script>
    export default {
        props: {
            field: {required: true},
            data: {required: true}
        },
        // watch:{
        //     localValue(newValue,oldValue){
        //       this.data.value = this.localValue;
        //       console.log(1,this.data.value);
        //       console.log(2,this.localValue);
        //   }
        // },
        watch:{
            data(){
                this.localValue = this.data.value
            }
        },
        computed:{
        },
        data() {
            return {
                localValue:this.data.value
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
