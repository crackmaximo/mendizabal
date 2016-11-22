<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('wearType','entity', array(
                    'class' => 'AppBundle:Product',
                    'choice_label' => 'wearType',
                    'label' => 'Tipo de Ropa',
                    'placeholder' => 'Elige una opcion',
                    'attr'   =>  array(
                        'class'   => 'wear')
                ))
                ->add('size','text', array(
                    'label' => 'Talla'
                ))
                ->add('colour','text', array(
                    'label' => 'Color'
                ))
                ->add('sex','text', array(
                    'label' => 'Sexo'
                ))
                ->add('price','text', array(
                    'label' => 'Precio'
                ))        
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_product';
    }


}
