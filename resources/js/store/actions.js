export default {
    login({ commit }, data) {
        commit('login',data);
    },
    logout({ commit }) {
        commit('clear');
    },

    newSave({ commit }, data ) {
        commit('newSave', data);
    },



    history({ commit }, data) {
        commit('history',data);
    },
    clear({ commit }) {
        commit('clear');
    },
    load({ commit }, data) {
        commit('load', data);
    },
    start({ commit }) {
        commit('start');
    },

    move({ commit }, room) {
        commit('move', room);
    }
};
