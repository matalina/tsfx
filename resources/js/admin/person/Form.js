import AppForm from '../app-components/Form/AppForm';

Vue.component('person-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                full_name:  '' ,
                name:  '' ,
                description:  '' ,
                is_self:  false ,
                always_on_person:  '' ,
                location:  '' ,
                
            }
        }
    }

});