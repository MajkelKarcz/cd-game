<?php

namespace My\GraBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class MonstersType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('lvl')
            ->add('reqStamina')  
            ->add('item')
            ->add('exp');
            
    }

    public function getName()
    {
        return 'monsters';
    }
}
