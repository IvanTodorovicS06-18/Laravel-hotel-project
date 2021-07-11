<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class sobachange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'soba:change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menja status sobe  zauzeta iz jeste u nije';

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
             DB::table('soba')
            ->where('zauzeta','=','jeste')
            ->update(['zauzeta' => 'nije']);
    }
}
