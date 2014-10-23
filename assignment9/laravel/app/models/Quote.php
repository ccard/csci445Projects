<?php

	/**
	* 
	*/
	class Quote extends Eloquent
	{
		
		protected $fillable = array('quote','author','genre_id');
		public $timestamps=false;
		public function genre()
		{
			return $this->belongsTo('Genre');
		}
	}

?>