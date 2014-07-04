<?php
namespace SPV\ClienteBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ClienteType extends AbstractType{

    public function buildForm(FormBuilder $builder, array $option){
        
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'cliente_form';
    }
}