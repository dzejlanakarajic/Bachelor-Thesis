<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
            array('name'=>'Web Development'),
            array('name'=>'Machine Learning'),
            array('name'=>'Android'),
            array('name'=>'iOS'),
         ));
    }
}
