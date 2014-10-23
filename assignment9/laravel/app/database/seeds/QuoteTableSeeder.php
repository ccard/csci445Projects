<?php

class QuoteTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('quotes')->insert(array(
			array('id'=>1, 'quote'=>"Speak softly and carry a big stick.", 'author'=>"FDR", 'genre_id'=>2),
			array('id'=>2, 'quote'=>"It is amazing curiosity survives a formal education.", 'author'=>"Albert Einstien", 'genre_id'=>3),
			array('id'=>3, 'quote'=>"Procastination is the art of keeping up wtih yesterday.", 'author'=>"Don Marquis", 'genre_id'=>1),
			array('id'=>4, 'quote'=>"If you could kick the person in the pants responsible for most of your trouble, you wouldn't sit for a month.", 'author'=>"Theodore Roosevelt", 'genre_id'=>1),
			));
	}

}

?>