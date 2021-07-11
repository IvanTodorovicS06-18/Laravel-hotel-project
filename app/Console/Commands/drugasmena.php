<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class drugasmena extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'druga:smena';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dodaje 8 radnih sati za radnike druge smene';

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
            ->where('smena' ,'=','druga')
            ->increment('radnisati', 8);
    }
}
