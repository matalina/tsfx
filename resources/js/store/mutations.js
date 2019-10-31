import initial from "./state";

export default {
    login(state, data) {
        state.user = data;
    },
    history(state, data) {
        state.history.push(data);
    },
    clear(state) {
        let reset = initial();

        Object.keys(reset).forEach(key => {
            state[key] = reset[key]
        })
    },

    load(state, {type, number, data}) {
        state[type][number] = data;
    },
    start(state) {
        state.new_game = false;
        state.character = state.npc['0000'];
    },

    move(state, room) {
        state.current_room = room;
    }
};
