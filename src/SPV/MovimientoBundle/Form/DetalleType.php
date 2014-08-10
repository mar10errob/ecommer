<?php
namespace SPV\MovimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DetalleType extends  AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder->add('');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class'=>'SPV\MovimientoBundle\Entity\DetalleMovimiento'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'spv_movimientobundle_detalletype';
    }
}