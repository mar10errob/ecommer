<?php

namespace SPV\DireccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Direccion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SPV\DireccionBundle\Entity\DireccionRepository")
 */
class Direccion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\DireccionBundle\Entity\Estado")
     */
    protected $estado;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SPV\DireccionBundle\Entity\Colonia")
     */
    protected $colonia;

    /**
     * @var string
     *
     * @ORM\Column(name="calle", type="string", length=50)
     */
    protected $calle;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_interior", type="string", length=5, nullable=true)
     */
    protected $numeroInterior;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_exterior", type="string", length=5)
     */
    protected $numeroExterior;


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
     * Set estado
     *
     * @param Estado $estado
     * @internal param \SPV\DireccionBundle\Entity\Estado|string $estado
     * @return Direccion
     */
    public function setEstado(\SPV\DireccionBundle\Entity\Estado $estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set colonia
     *
     * @param \SPV\DireccionBundle\Entity\Colonia|string $colonia
     * @return Direccion
     */
    public function setColonia(\SPV\DireccionBundle\Entity\Colonia $colonia)
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get colonia
     *
     * @return string 
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set calle
     *
     * @param string $calle
     * @return Direccion
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set numeroInterior
     *
     * @param string $numeroInterior
     * @return Direccion
     */
    public function setNumeroInterior($numeroInterior)
    {
        $this->numeroInterior = $numeroInterior;

        return $this;
    }

    /**
     * Get numeroInterior
     *
     * @return string 
     */
    public function getNumeroInterior()
    {
        return $this->numeroInterior;
    }

    /**
     * Set numeroExterior
     *
     * @param string $numeroExterior
     * @return Direccion
     */
    public function setNumeroExterior($numeroExterior)
    {
        $this->numeroExterior = $numeroExterior;

        return $this;
    }

    /**
     * Get numeroExterior
     *
     * @return string 
     */
    public function getNumeroExterior()
    {
        return $this->numeroExterior;
    }

    function __toString()
    {
        return $this->getCalle().' '.$this->getColonia()->getNombre().' '.$this->getNumeroExterior();
    }


}
