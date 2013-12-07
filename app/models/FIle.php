<?php 
namespace Filz;

//Clases,Funciones, Constantes estaran definidas en este espacio
// El \ lo ubica en el namespace local

class File extends \Eloquent
{
	protected $table='files';

	public function users()
	{
		return $this->belongsToMany('User');
	}
}

?>