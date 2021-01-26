<?php


include_once  dirname(__DIR__) . '/vendor/autoload.php';


use Lucio\Core\conf\LucioConfig;
use Cose\persistence\PersistenceContext;
use Lucio\Core\notificaciones\backupBBDD\BackupBBDD;

//inicializamos cuentas core.
LucioConfig::getInstance()->initialize();
LucioConfig::getInstance()->initLogger( dirname(__FILE__).  "/log4php.xml");

$persistenceContext =  PersistenceContext::getInstance();


$notificacion = new BackupBBDD();
$notificacion->send();

//cerramos la conexión a la base.
$persistenceContext->close();




?>
