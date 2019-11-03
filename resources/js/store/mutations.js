import initial from "./state";

export default {
    login(state, data) {
        state.user = data;
    },

    gameTick(state) {
        state.game_time ++;
    },
    newSave(state, data) {
        state.user.saves.push(data);
    },

    history(state, data) {
        state.history.push(data);
    },
    clear(state) {
        Object.assign(state, initial());
        /*let reset = initial();

        Object.keys(reset).forEach(key => {
            state[key] = reset[key]
        })*/
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
