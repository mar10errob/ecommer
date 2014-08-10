<?php
namespace SPV\ProductoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductoType extends  AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('existencia')
            ->add('fechaCaducidad')
            ->add('precioUnitario')
            ->add('proveedor')
            ->add('tipoProducto')
            ->add('tipoUnidad')
            ->add('imagen', 'file', array('required' => false, 'data_class' => null));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class'=>'SPV\ProductoBundle\Entity\Producto'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'spv_productobundle_productotype';
    }
}