<?php

namespace SPV\MovimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movimiento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SPV\MovimientoBundle\Entity\MovimientoRepository")
 */
class Movimiento
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
     * @ORM\ManyToOne(targetEntity="SPV\MovimientoBundle\Entity\TipoMovimiento")
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ClienteBundle\Entity\Cliente")
     */
    private $cliente;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\UsuarioBundle\Entity\Usuario")
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ProveedorBundle\Entity\Proveedor")
     */
    private $proveedor;

    /**
     * @var integer
     *
     * @ORM\Column(name="costo", type="integer")
     */
    private $costo;

    /**
     * @var integer
     *
     * @ORM\Column(name="saldo", type="integer")
     */
    private $saldo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime")
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_entrega", type="datetime")
     */
    private $fechaEntrega;

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
     * Set tipo
     *
     * @param \SPV\MovimientoBundle\Entity\TipoMovimiento|string $tipo
     * @return Movimiento
     */
    public function setTipo(\SPV\MovimientoBundle\Entity\TipoMovimiento $tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set cliente
     *
     * @param \SPV\ClienteBundle\Entity\Cliente|string $cliente
     * @return Movimiento
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
     * Set usuario
     *
     * @param \SPV\UsuarioBundle\Entity\Usuario|string $usuario
     * @return Movimiento
     */
    public function setUsuario(\SPV\UsuarioBundle\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set proveedor
     *
     * @param \SPV\ProveedorBundle\Entity\Proveedor|string $proveedor
     * @return Movimiento
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
     * Set costo
     *
     * @param integer $costo
     * @return Movimiento
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return integer 
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set saldo
     *
     * @param integer $saldo
     * @return Movimiento
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get slado
     *
     * @return integer 
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Movimiento
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaEntrega
     *
     * @param \DateTime $fechaEntrega
     * @return Movimiento
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
    }

    /**
     * Get fechaEntrega
     *
     * @return \DateTime 
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Movimiento
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
     * @return Movimiento
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
