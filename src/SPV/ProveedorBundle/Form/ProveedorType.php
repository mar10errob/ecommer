<?php
namespace SPV\ProveedorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProveedorType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder->add('nombre')->add('tipo');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class'=>'SPV\ProveedorBundle\Entity\Proveedor'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'spv_proveedorbundle_proveedortype';
    }
}
