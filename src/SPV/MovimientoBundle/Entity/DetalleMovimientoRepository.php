<?php

namespace SPV\MovimientoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DetalleMovimientoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DetalleMovimientoRepository extends EntityRepository
{
	public function findProductos($idProducto){
        $em=$this->getEntityManager();
        $consulta=$em->createQuery('
            SELECT d
            FROM MoviminetoBundle:DetalleMovimieto d
            JOIN d.producto p
            WHERE p.id= :prod');
        $consulta->setParameter('prod', $idProducto);

        return $consulta->getResult();
    }
}
