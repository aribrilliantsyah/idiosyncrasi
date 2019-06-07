<?php

use Illuminate\Database\Seeder;
use App\sosmed;

class SosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sosmeds')->delete();
        $data = array(
        			  array('name'=>'fb','url'=>'http://facebook.com'),
    				  array('name'=>'twitter','url'=>'http://twitter.com'),
                      array('name'=>'gplus','url'=>'http://gmail.com'),
                      array('name'=>'ig','url'=>'http://instagram.com'),);
        DB::table('sosmeds')->insert($data);
    }
}
