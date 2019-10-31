import axios from 'axios';
import store from './store';

function hasToken() {
    return store.state.user !== undefined
        && store.state.user !== null
        && store.state.user !== {};
}

export default {
    send(verb, path, data) {
        return axios({
            url: path,
            method: verb,
            baseURL: '/api/',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Authorization': 'Bearer ' + hasToken()?store.state.user.api_token:'',
                'Accept': 'application/json',
            },
            data,
        })
    },
}

