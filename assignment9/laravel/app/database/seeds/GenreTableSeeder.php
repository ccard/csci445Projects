<?php

class GenreTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('genres')->insert(array(
			array('id'=>1, 'name'=>"Humurous"),
			array('id'=>2, 'name'=>"Political"),
			array('id'=>3, 'name'=>"Intersting"),
			));
	}

}

?>