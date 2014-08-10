<?php
namespace SPV\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder
            ->add('nombre')
            ->add('apellidoPaterno')
            ->add('apellidoMaterno')
            ->add('password','repeated', array(
                'type'=>'password',
                'invalid_message'=>'Ambos campos de contraseña deben coincidir'
            ))
            ->add('tipo');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class'=>'SPV\UsuarioBundle\Entity\Usuario'
        ));
    }
    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'spv_usuariobundle_usuariotype';
    }
}