<?php
namespace SPV\UsuarioBundle\DataFistures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SPV\UsuarioBundle\Entity\TipoUsuario;
use SPV\UsuarioBundle\Entity\Usuario;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Usuarios implements FixtureInterface, ContainerAwareInterface{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container=$container;
    }

    function load(ObjectManager $manager)
    {
        $tipo1=new TipoUsuario();
        $tipo1->setDescripcion('administrador');
        $manager->persist($tipo1);

        $admin=new Usuario();
        $admin->setNombre('admin');
        $admin->setApellidoPaterno('dmi');
        $admin->setApellidoMaterno('nido');
        $admin->setTipo($tipo1);
        $admin->setSalt(md5(time()));

        $encoder1=$this->container->get('security.encoder_factory')->getEncoder($admin);
        $admin->setPassword($encoder1->encodePassword('admin',$admin->getSalt()));
        $admin->setStatus(true);

        $manager->persist($admin);

        //empleado

        $tipo2=new TipoUsuario();
        $tipo2->setDescripcion('empleado');
        $manager->persist($tipo2);

        /*$empleado=new Usuario();
        $empleado->setNombre('empleado');
        $empleado->setApellidoPaterno('mplead');
        $empleado->setApellidoMaterno('oemple');
        $empleado->setTipo($tipo2);
        $empleado->setSalt(md5(time()));

        $encoder2=$this->container->get('security.encoder_factory')->getEncoder($empleado);
        $empleado->setPassword($encoder2->encodePassword('empleado',$empleado->getSalt()));
        $empleado->setStatus(true);

        $manager->persist($empleado);*/

        $manager->flush();
    }
}