<template>
</template>

<script>
import Form from './Form.vue';
export default {
    name: 'contact-component',
    mixins: [Form],

    data(){
        return{
            formData: {
                name: null,
                surname: null,
                email: null
            }
        }
    },

    methods:{
        storeContact(){
            this.post('/save-contact',this.formData)
        }
    }
}
</script>