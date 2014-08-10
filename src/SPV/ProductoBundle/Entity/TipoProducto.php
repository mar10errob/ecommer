<?php

namespace SPV\ProductoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SPV\ProductoBundle\Util\Util;

/**
 * TipoProducto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoProducto
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
     * @ORM\Column(name="slug", type="string", length=50)
     */
    protected $slug;


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
     * @return TipoProducto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        $this->slug=Util::getSlug($descripcion);

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
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function __toString(){
        return $this->getDescripcion();
    }

}
