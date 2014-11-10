<?php

namespace SPV\DireccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfGral
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SPV\DireccionBundle\Entity\ConfGralRepository")
 */
class ConfGral
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
     * @ORM\Column(name="costo_envio", type="float", nullable=true)
     */
    private $costoEnvio;


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
     * Set precioEnvio
     *
     * @param string $precioEnvio
     * @return ConfGral
     */
    public function setCostoEnvio($costoEnvio)
    {
        $this->costoEnvio = $costoEnvio;

        return $this;
    }

    /**
     * Get precioEnvio
     *
     * @return string 
     */
    public function getCostoEnvio()
    {
        return $this->costoEnvio;
    }
}
