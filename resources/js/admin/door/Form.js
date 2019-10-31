import AppForm from '../app-components/Form/AppForm';

Vue.component('door-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                direction:  '' ,
                is_locked:  false ,
                key:  '' ,
                password:  '' ,
                room_a:  '' ,
                room_b:  '' ,
                
            }
        }
    }

});