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
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    protected $descripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="precio_unitario", type="float")
     */
    protected $precioUnitario;

    /**
     * @var integer
     *
     * @ORM\Column(name="existencia", type="integer")
     */
    protected $existencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="datetime")
     */
    protected $fechaIngreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_caducidad", type="datetime")
     */
    protected $fechaCaducidad;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ProductoBundle\Entity\TipoUnidad")
     */
    protected $tipoUnidad;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ProductoBundle\Entity\TipoProducto")
     */
    protected $tipoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     */
    protected $imagen;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ProveedorBundle\Entity\Proveedor")
     */
    protected $proveedor;

    /**
     * @var integer
     *
     * @ORM\Column(name="ranking", type="integer")
     */
    protected $ranking;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    protected $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    protected $status;


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
     * @param float $precioUnitario
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
     * @return float
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
     * set imagen
     *
     * @param string $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
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
     * set ranking
     *
     * @param int $ranking
     */
    public function setRanking($ranking)
    {
        $this->ranking = $ranking;

        return $this;
    }

    /**
     * get ranking
     *
     * @return int
     */
    public function getRanking()
    {
        return $this->ranking;
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
