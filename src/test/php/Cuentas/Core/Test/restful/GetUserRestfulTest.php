<?php

namespace Lucio\Core\Test\sucursales;

use Lucio\Core\criteria\TareaCriteria;


include_once dirname(__DIR__). '/conf/init.php';

use Lucio\Core\Test\GenericTest;
use Cose\Security\Restful\service\ServiceFactory;

use Cose\Security\service\SecurityContext;
use Cose\Security\Restful\exception\UserRestfulNotFoundException;
use Cose\Security\Restful\exception\UserRestfulExpiredException;

class GetUserRestulTest extends GenericTest{

	/**
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getUserRestfulService();

		$this->log("get user restfull", __CLASS__);

		try {

			$user = $service->getUserByToken( "aaf55c01ccf9ac480c825ad719146711" );

			$this->log("User: " . $user->getUserOid(), __CLASS__);

		} catch (UserRestfulNotFoundException $e) {
			$this->log( $e->getMessage(), __CLASS__);
		} catch (UserRestfulExpiredException $e) {
			$this->log( $e->getMessage(), __CLASS__);
		}





	}
}
?>
