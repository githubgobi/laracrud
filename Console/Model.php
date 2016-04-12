<?php

namespace App\Libs\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class Model extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tb:model {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Model class based on table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        try {
            $table = $this->argument('table');
            $modelCrud = new \App\Libs\ModelCrud($table);
            print_r($modelCrud->pivotTables);
            $modelCrud->make();
            $this->info('Model class successfully created');
        } catch (\Exception $ex) {
            $this->error($ex->getMessage());
        }
    }

}
