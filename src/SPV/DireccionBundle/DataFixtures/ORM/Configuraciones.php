<?php 
namespace SPV\DireccionBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SPV\DireccionBundle\Entity\ConfGral;

class Configuraciones implements FixtureInterface
{
	function load(ObjectManager $manager)
    {
    	$configuracion=new ConfGral();
    	$configuracion->setCostoEnvio(0);
    	$manager->persist($configuracion);
    	$manager->flush();
    }
}