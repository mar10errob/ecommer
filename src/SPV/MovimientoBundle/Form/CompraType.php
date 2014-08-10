<?php
namespace SPV\MovimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompraType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder
            ->add('observaciones');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class'=>'SPV\MovimientoBundle\Entity\Movimiento'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'spv_movimientobundle_compratype';
    }
}