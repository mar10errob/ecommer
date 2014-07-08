<?php

namespace SPV\ProductoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoUnidad
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoUnidad
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
     * @ORM\Column(name="descripcion", type="string", length=50)
     */
    protected $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="simbolo", type="string", length=10)
     */
    protected $simbolo;


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
     * Set descripcion
     *
     * @param string $descripcion
     * @return TipoUnidad
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
     * Set simbolo
     *
     * @param string $simbolo
     * @return TipoUnidad
     */
    public function setSimbolo($simbolo)
    {
        $this->simbolo = $simbolo;

        return $this;
    }

    /**
     * Get simbolo
     *
     * @return string 
     */
    public function getSimbolo()
    {
        return $this->simbolo;
    }
}
