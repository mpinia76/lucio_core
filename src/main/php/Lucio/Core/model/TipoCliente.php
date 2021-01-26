<?php
namespace Lucio\Core\model;

/**
 * Sexo
 *
 * @author Marcos
 * @since 22-01-2021
 */

class TipoCliente {

    const CLIENTE = 1;
    const COMPANIA = 2;


    private static $items = array(
    								   TipoCliente::CLIENTE=> "tipoCliente.c.label",
    								   TipoCliente::COMPANIA=> "tipoCliente.cia.label",
    								   );

	public static function getItems(){
		return self::$items;
	}

	public static function getLabel($value){
		return self::$items[$value];
	}

}
?>
