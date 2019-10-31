import AppForm from '../app-components/Form/AppForm';

Vue.component('item-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                name:  '' ,
                description:  '' ,
                storable_id:  '' ,
                storable_type:  '' ,
                
            }
        }
    }

});