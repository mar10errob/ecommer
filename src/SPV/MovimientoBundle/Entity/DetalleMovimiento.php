<?php

namespace SPV\MovimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleMovimiento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SPV\MovimientoBundle\Entity\DetalleMovimientoRepository")
 */
class DetalleMovimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="movimiento", type="string", length=255)
     */
    private $movimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="producto", type="string", length=255)
     */
    private $producto;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set movimiento
     *
     * @param string $movimiento
     * @return DetalleMovimiento
     */
    public function setMovimiento($movimiento)
    {
        $this->movimiento = $movimiento;

        return $this;
    }

    /**
     * Get movimiento
     *
     * @return string 
     */
    public function getMovimiento()
    {
        return $this->movimiento;
    }

    /**
     * Set producto
     *
     * @param string $producto
     * @return DetalleMovimiento
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return string 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return DetalleMovimiento
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
}
