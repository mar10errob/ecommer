<?php

namespace SPV\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FechaPedidosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('hora')
            ->add('ruta')
            ->add('pedido')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SPV\DireccionBundle\Entity\FechaPedidos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'spv_direccionbundle_fechapedidos';
    }
}
