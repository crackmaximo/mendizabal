<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => 'Nombre'))
            ->add('phone', 'text', array(
                'label' => 'Telefono'))
            ->add('save', 'submit', array(
                'label'=>'guardar cliente',
                'attr'=> array('class'=>'btn btn-success btn-circle pull-left')
                ))
            ->add('saveAndAdd', 'submit', array(
                'label'=>'guardar cliente y volver tarea',
                'attr'=> array('class'=>'btn btn-success btn-circle')
                ))
            
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Client'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'client';
    }


}
