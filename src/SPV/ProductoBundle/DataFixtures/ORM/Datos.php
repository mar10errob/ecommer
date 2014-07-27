<?php 
namespace SPV\ProductoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SPV\ProductoBundle\Entity\Producto;
use SPV\ProductoBundle\Entity\TipoProducto;
use SPV\ProductoBundle\Entity\TipoUnidad;
use DateTime;
/**
* Productos frescos
*Carnes
*Lácteos
*Alimentos congelados
*Pan, cereal, arroz y pastas
*
*
*/
class Datos implements FixtureInterface
{
	function load(ObjectManager $manager)
	{
		foreach (array('Productos frescos','Carnes','Lácteos','Alimentos congelados','Pan, cereal, arroz y pastas') as $descripcion) {
			$tipoproducto=new TipoProducto();
			$tipoproducto->setDescripcion($descripcion);

			$manager->persist($tipoproducto);
		}
		$manager->flush();
		
		$tipos=$manager->getRepository('ProductoBundle:TipoProducto')->findAll();
		foreach ($tipos as $tipo) {
			for($i=0;$i<10;$i++){
				$producto=new Producto();
				$producto->setNombre('Producto'.$i);
				$producto->setDescripcion('Es el producto'.$i);
				$producto->setExistencia($i*3);
				$producto->setStatus(true);
				$producto->setFechaCaducidad(new \DateTime('now + 2 month'));
				$producto->setFechaIngreso(new \DateTime('now'));
				$producto->setPrecioUnitario(65*$i);
				$producto->setTipoProducto($tipo);
				$producto->setRanking(0);
				$manager->persist($producto);
			}
		}
		$manager->flush();
	}
}