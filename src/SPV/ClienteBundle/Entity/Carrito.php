<?php

namespace SPV\ClienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carrito
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SPV\ClienteBundle\Entity\CarritoRepository")
 */
class Carrito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ClienteBundle\Entity\Cliente")
     */
    protected $cliente;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ProductoBundle\Entity\Producto")
     */
    protected $producto;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    protected $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_add", type="datetime")
     */
    protected $fechaAdd;


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
     * Set cliente
     *
     * @param \SPV\ClienteBundle\Entity\Cliente $cliente
     * @return Carrito
     */
    public function setCliente(\SPV\ClienteBundle\Entity\Cliente $cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set producto
     *
     * @param \SPV\ProductoBundle\Entity\Producto $producto
     * @return Carrito
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
     * @return Carrito
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

    /**
     * Set fechaAdd
     *
     * @param \DateTime $fechaAdd
     * @return Carrito
     */
    public function setFechaAdd($fechaAdd)
    {
        $this->fechaAdd = $fechaAdd;

        return $this;
    }

    /**
     * Get fechaAdd
     *
     * @return \DateTime 
     */
    public function getFechaAdd()
    {
        return $this->fechaAdd;
    }
}
