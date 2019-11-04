<?php

namespace App\Console\Commands;

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
        $item_paths = \File::files(storage_path('/games/item/'));
        $npc_paths = \File::files(storage_path('/games/npc'));
        $room_paths = \File::files(storage_path('/games/room'));

        foreach($item_paths as $path) {
            $file = \File::get($path);

            $data = YamlFrontMatter::parse($file);

            $body = $data->body();
            $data = $data->matter();


        }
    }
}
