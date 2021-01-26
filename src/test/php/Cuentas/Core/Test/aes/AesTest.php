<?php

namespace Lucio\Core\Test\aes;

use Lucio\Core\Test\GenericTest;


include_once dirname(__DIR__). '/conf/init.php';

class AesTest extends GenericTest{


	public function test(){


		$values = array("admin", "4857 20 ****8443", "6712 09 ****0205", "5256 38 ****9561", "bernardo");

		foreach ($values as $value) {

			$encry = \Cose\Security\utils\SecurityUtils::aesEncrypt($value);

			$this->log("$value => $encry");

			$decry = \Cose\Security\utils\SecurityUtils::aesDecrypt($encry);

			$this->log("$encry => $decry");

		}



		$decry = \Cose\Security\utils\SecurityUtils::aesDecrypt("K6G+ELZxkhgQKufXA5CS1Q==");
		$this->log("$decry");

		//$this->log(WalibaUtils::differenceBetweenDates("2014-12-16", "2014-11-17"));

	}
}
?>
