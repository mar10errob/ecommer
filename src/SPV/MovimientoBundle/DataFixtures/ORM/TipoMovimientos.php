<?php
namespace SPV\MovimientoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SPV\MovimientoBundle\Entity\TipoMovimiento;

class TipoMovimientos implements FixtureInterface{


    function load(ObjectManager $manager)
    {
        $tipos=array('compra','venta','pedido');

        foreach($tipos as $t){
            $tipo=new TipoMovimiento();
            $tipo->setDescripcion($t);
            $manager->persist($tipo);
        }
        $manager->flush();
    }
}