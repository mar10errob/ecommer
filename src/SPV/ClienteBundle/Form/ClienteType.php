<?php
namespace SPV\ClienteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder
            ->add('nombre')
            ->add('apellidoPaterno')
            ->add('apellidoMaterno')
            ->add('email','email')
            ->add('password','repeated', array(
                'type'=>'password',
                'invalid_message'=>'Ambos campos de contraseña deben coincidir'
            ))
            ->add('fechaNacimiento','birthday')
            ->add('curp')
            ->add('telefono')
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class'=>'SPV\ClienteBundle\Entity\Cliente'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'spv_clientebundle_clientetype';
    }
}