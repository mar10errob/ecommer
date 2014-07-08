<?php
namespace SPV\DireccionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DireccionType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder
            ->add('calle')
            ->add('numeroExterior')
            ->add('numeroInterior')
            ->add('colonia','entity',array(
                'class'=>'SPV\DireccionBundle\Entity\Colonia',
                'empty_value'=>'--Colonia--'
            ))
            ->add('estado','entity',array(
                'class'=>'SPV\DireccionBundle\Entity\Estado',
                'empty_value'=>'--Estado--'
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class'=>'SPV\DireccionBundle\Entity\Direccion'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'spv_direccionbundle_direcciontype';
    }
}