<?php
namespace SPV\ClienteBundle\Entity;

use Sylius\Bundle\CartBundle\Entity\CartItem as BaseCartItem;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="")
 * @ORM\Table(name="app_cart_item")
 */
class CartItem extends BaseCartItem
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="SPV\ProductoBundle\Entity\Producto")
     */
    protected  $producto;

    public function getProducto(){
        return $this->producto;
    }

    public function setProducto(\SPV\ProductoBundle\Entity\Producto $producto){
        $this->producto=$producto;
    }
}

