<?php

namespace App\Console\Commands;

use App\Models\Item;
use App\Models\Person;
use App\Models\Room;
use Illuminate\Console\Command;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class LoadGameContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:content';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load game yaml/markdown game content in storage/game to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $item_paths = \File::files(storage_path('game/item'));
        $npc_paths = \File::files(storage_path('game/npc'));
        $room_paths = \File::files(storage_path('game/room'));

        $bar = $this->output->createProgressBar(count($item_paths) + count($npc_paths) + count($room_paths));
        $bar->start();

        foreach($room_paths as $path) {
            $file = \File::get($path);
            $parts = explode('/',$path);
            $filename = $parts[count($parts) - 1];
            $parts = explode('.',$filename);
            $id = (int) $parts[0];

            $data = YamlFrontMatter::parse($file);

            $body = $data->body();
            $data = (object) $data->matter();

            $test = [
                'id' => $id,
            ];

            $room = Room::updateOrCreate($test, [
                'title' => $data->name,
                'description' => $body,
            ]);
            $bar->advance();
        }

        foreach($item_paths as $path) {
            $file = \File::get($path);
            $parts = explode('/',$path);
            $filename = $parts[count($parts) - 1];
            $parts = explode('.',$filename);
            $id = (int) $parts[0];

            $data = YamlFrontMatter::parse($file);

            $body = $data->body();
            $data = (object) $data->matter();

            $test = [
                'id' => $id,
            ];

            foreach($data->location as $type => $value) {
                switch($type)
                {
                    case 'room':
                        $type = Room::class;
                        break;
                    case 'npc':
                        $type = Person::class;
                        break;
                    case 'item':
                    default:
                        $type = Item::class;
                        break;
                }
                continue;
            }

            $item = Item::updateOrCreate($test, [
                'title' => $data->name,
                'name' => $data->shortname,
                'description' => $body,
                'storable_id' => $value,
                'storable_type' => $type,
            ]);
            $bar->advance();
        }

        foreach($npc_paths as $path) {
            $file = \File::get($path);
            $parts = explode('/',$path);
            $filename = $parts[count($parts) - 1];
            $parts = explode('.',$filename);
            $id = (int) $parts[0];

            $data = YamlFrontMatter::parse($file);

            $body = $data->body();
            $data = (object) $data->matter();

            $test = [
                'id' => $id,
            ];

            $npc = Person::updateOrCreate($test, [
                'full_name' => $data->name,
                'name' => $data->shortname,
                'description' => $body,
                'is_self' => $id === 1,
                'always_on_person' => $data->always,
                'location' => $data->location,
            ]);
            $bar->advance();
        }

        $bar->finish();
        $this->info(' Done!');
    }
}
