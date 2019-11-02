<template>
    <div class="bg-light">
        <div
            class="input-group p-3"
        >
            <div
                class="input-group-prepend"
            >
                <span class="input-group-text pb-2">
                    <i class="fas fa-terminal fa-fw"></i>
                </span>
            </div>
            <input
                type="text"
                v-model="command"
                class="form-control"
                @keyup.enter="execute()"
                placeholder="Enter Command here"
                style="outline: none"
                autofocus
            />
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import commands from "../commands/";
    import game from '../objects/game';
    import Room from '../objects/room'
    import Person from "../objects/person";
    import Item from "../objects/item";
    import Mouse from '../objects/mouse';

    export default {
        name: 'CommandLine',
        data() {
            return {
                command: null,
                count: 0,
                mouse: new Mouse(),
            };
        },
        methods: {
            ...game,
            execute() {
                this.count++;
                let output = null;
                let data = commands.parse(this.command, this.count);

                this.$store.dispatch('history', {
                    type: 'prompt',
                    text: data.text,
                    timestamp: moment().unix(),
                });

                if(data.command === null) {
                    this.$store.dispatch('history', {
                        type: 'error',
                        text: 'Invalid command',
                        timestamp: moment().unix(),
                    });

                    return;
                }

                switch (data.command.on) {
                    case 'room':
                        let room_number = this.$store.state.current_room;
                        let room = new Room();
                        room.init(room_number, this.$store);
                        room[data.command.command](this.$store, ...data.command.args);
                        break;
                    case 'item':
                        let item = data.command.args[0];
                        let obj = new Item();
                        obj.init(item, this.$store);
                        obj[data.command.command](this.$store, ...data.command.args);
                        break;
                    case 'npc':
                        let npc = data.command.args[0];
                        let person = new Person();
                        person.init(npc, this.$store);
                        person[data.command.command](this.$store, ...data.command.args);
                        break;
                    case 'game':
                        this[data.command.command]();
                        break;
                    case 'mouse':
                        this.mouse.do(data.command.args);
                        break;
                    default:
                        output = 'No idea what you want to do';
                }

                this.command = null;
            },
        },
    }
</script>
