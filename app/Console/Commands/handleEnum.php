<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class handleEnum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:enum {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will create enums/enumName';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument()['name'];
        $sample = file_get_contents('enumsSample/SampleEnum', 'a+');
        $sample = str_replace('{{name}}',$name.'Enum',$sample );
        $name = "app/enums/$name"."Enum.php";
//        fopen($name,'a+');
        file_put_contents($name, $sample);
    }
}
