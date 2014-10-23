<?php
	/**
	* 
	*/
	class Genre extends Eloquent
	{
		public $timestamps=false;
		public function quotes()
		{
			return $this->hasMany('Quote');
		}
	}
?>