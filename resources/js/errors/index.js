import forms from './form';

export default {
    ...forms,
    error_handler(error) {
        if(error.response.data.message === '') {
            EventBus.fire('set-alert', {
                type: 'danger',
                message: error.response.data.exception,
            });
        }
        else if(error.response.data.errors !== undefined) {
            let errors = error.response.data.errors;
            this.validationErrors(errors);
        }
        else {
            EventBus.fire('set-alert', {
                type: 'danger',
                message: error.response.data.message,
            });
        }
    }
}
