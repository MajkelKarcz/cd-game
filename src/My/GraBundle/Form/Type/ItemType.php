<?php

namespace My\GraBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ItemType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('strBonus')
            ->add('hpBonus')  
            ->add('staminaBonus')
            ->add('weight');
            
    }

    public function getName()
    {
        return 'item';
    }
}
