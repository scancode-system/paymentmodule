<?php

namespace Modules\Payment\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Payment\Entities\Payment;
use \Exception;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        try{
            factory(Payment::class, 5)->create();
        } catch(Exception $e){
            echo "\n".$e->getMessage()."\n\n";
        }



    }
}
