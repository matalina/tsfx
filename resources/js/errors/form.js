export default {
    /*
        All validation error should be the name of the field + _error
     */
    validationErrors(errors) {
        let messages = [];
        for(let i in errors) {
            let error = errors[i];

            let parts =i.split('.');

            if(parts.length === 1) {
                if(messages[i] === undefined) {
                    messages[i] = null;
                }

                messages[i + '_error'] = error[0];
            }
            else if (parts.length === 2) {
                let name = parts[0] + '_error';
                let index = parts[1];

                if(messages[name] === undefined) {
                    messages[name] = [];
                }

                if(messages[name][index] === undefined) {
                    messages[name][index] = null;
                }

                messages[name][index] = error[0];
            }
        }

        for(let name in messages) {
            this[name] = messages[name];
        }
    },

    clearError(field) {
        if(this[field + '_error'] !== null) {
            this[field + '_error'] = null;
        }
    },
    hasError(field) {
        return this[field + '_error'] !== null;
    },
}
