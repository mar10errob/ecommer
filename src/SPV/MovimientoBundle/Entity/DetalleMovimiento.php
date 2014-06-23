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
     * @ORM\ManyToOne(targetEntity="SPV\MovimientoBundle\Entity\Movimiento")
     */
    private $movimiento;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ProductoBundle\Entity\Producto")
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
     * @param \SPV\MovimientoBundle\Entity\Movimiento|string $movimiento
     * @return DetalleMovimiento
     */
    public function setMovimiento(\SPV\MovimientoBundle\Entity\Movimiento $movimiento)
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
     * @param \SPV\ProductoBundle\Entity\Producto|string $producto
     * @return DetalleMovimiento
     */
    public function setProducto(\SPV\ProductoBundle\Entity\Producto $producto)
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
