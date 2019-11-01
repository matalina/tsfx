import Vue from 'vue';
import Vuex from 'vuex';

import createPersistedState from 'vuex-persistedstate';
import VuexPersistence from 'vuex-persist';

const vuexLocal = new VuexPersistence({
    storage: window.localStorage
});

import state from './state';
import mutations from './mutations';
import actions from './actions';

Vue.use(Vuex);

export default new Vuex.Store({
    plugins: [
        //createPersistedState(),
        vuexLocal.plugin
    ],
    state: state(),
    mutations,
    actions,
});
