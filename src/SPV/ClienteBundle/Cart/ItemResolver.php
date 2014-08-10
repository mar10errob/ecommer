<?php
namespace SPV\ClienteBundle\Cart;

use Sylius\Bundle\CartBundle\Model\CartItemInterface;
use Sylius\Bundle\CartBundle\Resolver\ItemResolverInterface;
use Sylius\Bundle\CartBundle\Resolver\ItemResolvingException;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class ItemResolver implements ItemResolverInterface
{
    private $entityManger;

    public function __construct(EntityManager $entityManger)
    {
        $this->entityManger = $entityManger;
    }

    /**
     * Returns item to add.
     * It takes empty and clean item object as first argument.
     *
     * @param CartItemInterface $item
     * @param Request $request
     *
     * @throws \Sylius\Bundle\CartBundle\Resolver\ItemResolvingException
     * @return CartItemInterface
     */
    public function resolve(CartItemInterface $item, Request $request)
    {
        $productoId= $request->query->get('productoId');

        if(!$productoId || !$producto=$this->getProductoRepository()->find($productoId)){
            throw new ItemResolvingException('No se encuentra el producto');
        }

        $item->setProducto($producto);
        $item->setUnitPrice($producto->getPrecioUnitario());

        return $item;

    }

    /**
     * @return mixed
     */
    public function getProductoRepository()
    {
        return $this->entityManger->getRepository('ProductoBundle:Producto');
    }


}