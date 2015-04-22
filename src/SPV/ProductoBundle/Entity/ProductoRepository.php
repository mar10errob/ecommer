<?php

namespace SPV\ProductoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProductoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductoRepository extends EntityRepository
{
    public function findRecientes(){
        $em=$this->getEntityManager();
        $consulta=$em->createQuery('
        SELECT p
        FROM ProductoBundle:Producto p
        WHERE p.fechaIngreso BETWEEN :inicio AND :final
        ORDER BY p.fechaIngreso DESC');
        $consulta->setMaxResults(9);
        $consulta->setParameter('inicio',new \DateTime('today - 2 weeks'));
        $consulta->setParameter('final',new \DateTime('today'));

        return $consulta->getResult();
    }

    public function findPopulares(){
        $em=$this->getEntityManager();
        $consulta=$em->createQuery('
        SELECT p
        FROM ProductoBundle:Producto p
        ORDER BY p.ranking DESC');
        $consulta->setMaxResults(6);

        return $consulta->getResult();
    }

    public function findCategorias($slug){
        $em=$this->getEntityManager();
        $consulta=$em->createQuery('
            SELECT p
            FROM ProductoBundle:Producto p
            JOIN p.tipoProducto t
            WHERE t.slug= :tipo');
        $consulta->setParameter('tipo', $slug);

        return $consulta->getResult();
    }

    public function findRango($finicial,$ffinal){
        $em=$this->getEntityManager();
        $consulta=$em->createQuery('
        SELECT p
        FROM ProductoBundle:Producto p
        WHERE p.fechaIngreso BETWEEN :inicio AND :final
        ORDER BY p.fechaIngreso DESC');
        $consulta->setParameter('inicio',$finicial);
        $consulta->setParameter('final',$ffinal);

        return $consulta->getResult();
    }
}
