<?php
//Access.php

	class Access extends Eloquent
	{
		
	    protected $table = 'accesses';

	    public function user(){
			return $this->belongsTo('User');
		}

	}

?>