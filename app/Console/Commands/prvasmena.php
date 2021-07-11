<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class prvasmena extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prva:smena';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dodaje 8 radnih sati svakome koje prva smena';

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
        DB::table('zaposleni')
            ->where('radio','=','dosao')
            ->where('smena' ,'=','prva')
            ->increment('radnisati', 8);
    }
}
