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
    protected $id;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\MovimientoBundle\Entity\TipoMovimiento")
     */
    protected $tipo;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ClienteBundle\Entity\Cliente")
     */
    protected $cliente;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\UsuarioBundle\Entity\Usuario")
     */
    protected $usuario;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\ProveedorBundle\Entity\Proveedor")
     */
    protected $proveedor;

    /**
     * @var float
     *
     * @ORM\Column(name="costo", type="float", nullable=true)
     */
    protected $costo;

    /**
     * @var float
     *
     * @ORM\Column(name="saldo", type="float", nullable=true)
     */
    protected $saldo;

    /**
     * @var string
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     *
     */
    protected $observaciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime")
     */
    protected $fechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_entrega", type="datetime", nullable=true)
     */
    protected $fechaEntrega;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
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
     * @param float $costo
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
     * @return float
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set saldo
     *
     * @param float $saldo
     * @return Movimiento
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get saldo
     *
     * @return float
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set obseravciones
     *
     * @param string $observaciones
     * @return Movimiento
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
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

    public function __toString()
    {
        if($this->getTipo()->getDescripcion()=='pedido'){
            return 'Pedido '.$this->getId().' '.$this->getCliente()->__toString();
        }else{
            return $this->getId();
        }
    }
}
