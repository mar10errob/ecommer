<?php

namespace SPV\ProductoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SPV\ProductoBundle\Util\Util;

/**
 * Producto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SPV\ProductoBundle\Entity\ProductoRepository")
 */
class Producto
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="precio_unitario", type="integer")
     */
    private $precioUnitario;

    /**
     * @var integer
     *
     * @ORM\Column(name="existencia", type="integer")
     */
    private $existencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="datetime")
     */
    private $fechaIngreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_caducidad", type="datetime")
     */
    private $fechaCaducidad;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ProductoBundle\Entity\TipoUnidad")
     */
    private $tipoUnidad;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ProductoBundle\Entity\TipoProducto")
     */
    private $tipoProducto;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ProveedorBundle\Entity\Proveedor")
     */
    private $proveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Producto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        $this->slug= Util::getSlug($nombre);

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set precioUnitario
     *
     * @param integer $precioUnitario
     * @return Producto
     */
    public function setPrecioUnitario($precioUnitario)
    {
        $this->precioUnitario = $precioUnitario;

        return $this;
    }

    /**
     * Get precioUnitario
     *
     * @return integer 
     */
    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }

    /**
     * Set existencia
     *
     * @param integer $existencia
     * @return Producto
     */
    public function setExistencia($existencia)
    {
        $this->existencia = $existencia;

        return $this;
    }

    /**
     * Get existencia
     *
     * @return integer 
     */
    public function getExistencia()
    {
        return $this->existencia;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return Producto
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set fechaCaducidad
     *
     * @param \DateTime $fechaCaducidad
     * @return Producto
     */
    public function setFechaCaducidad($fechaCaducidad)
    {
        $this->fechaCaducidad = $fechaCaducidad;

        return $this;
    }

    /**
     * Get fechaCaducidad
     *
     * @return \DateTime 
     */
    public function getFechaCaducidad()
    {
        return $this->fechaCaducidad;
    }

    /**
     * Set tipoUnidad
     *
     * @param \SPV\ProductoBundle\Entity\TipoUnidad|string $tipoUnidad
     * @return Producto
     */
    public function setTipoUnidad(\SPV\ProductoBundle\Entity\TipoUnidad $tipoUnidad)
    {
        $this->tipoUnidad = $tipoUnidad;

        return $this;
    }

    /**
     * Get tipoUnidad
     *
     * @return string 
     */
    public function getTipoUnidad()
    {
        return $this->tipoUnidad;
    }

    /**
     * Set tipoProducto
     *
     * @param \SPV\ProductoBundle\Entity\TipoProducto|string $tipoProducto
     * @return Producto
     */
    public function setTipoProducto(\SPV\ProductoBundle\Entity\TipoProducto $tipoProducto)
    {
        $this->tipoProducto = $tipoProducto;

        return $this;
    }

    /**
     * Get tipoProducto
     *
     * @return string 
     */
    public function getTipoProducto()
    {
        return $this->tipoProducto;
    }

    /**
     * Set proveedor
     *
     * @param \SPV\ProveedorBundle\Entity\Proveedor|string $proveedor
     * @return Producto
     */
    public function setProveedor(\SPV\ProveedorBundle\Entity\Proveedor $proveedor)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return string 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Producto
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Producto
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
