<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaskType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('startDate', 'text', array(
                    'label' => 'task.startDate',
                    'read_only'=> 'true',
                    'translation_domain' => 'AppBundle'
                ))
                ->add('endDate', 'text', array(
                    'label' => 'task.endDate',
                    'translation_domain' => 'AppBundle'  
                ))
                ->add('priceFull', 'money', array('label' => 'task.priceFull',
                    'invalid_message'=>'Formato de moneda incorrecto',
                    'translation_domain' => 'AppBundle'                    
                ))
                ->add('taskStatus', 'choice', array(
                    'choices' => array('Sin iniciar' => 'Sin iniciar','En curso' => 'En curso',
                    'Completado' => 'Completado'),
                    'label' => 'task.taskStatus',
                    'translation_domain' => 'AppBundle'    
                ))
                ->add('accountPrice', 'money', array(
                    'label' => 'task.accountPrice',
                    'required' => false,
                    'invalid_message'=>'precio erroneo',
                    'translation_domain' => 'AppBundle'
                ))
                ->add('statusPay', 'choice', array(
                    'choices' => array('Pagado' => 'pagado','A cuenta' => 'a cuenta',
                    'Pendiente' => 'pendiente'),
                    'label' => 'task.statusPay',
                    'placeholder' => 'Elige una opcion',
                    'translation_domain' => 'AppBundle'
                ))
                ->add('comment', 'textarea', array(
                    'label' => 'task.comment',
                    'required' => false,
                    'translation_domain' => 'AppBundle'
                ))
                ->add('client','text', array(
                    'label' => 'cliente',
                    'required' => false
                ))
                //->add('client', 'entity', array(
                //    'class' => 'AppBundle\Entity\Client',
                //    'placeholder' => 'Choose an option',
                //    'choice_label' => 'longname',
                //    'label' => 'task.client'
                //))
                ->add('falla', 'entity', array(
                        'class' => 'AppBundle:Falla',
                        'choice_label' => 'name',
                        'label' => 'task.falla',
                        'placeholder' => 'Elige una opcion',
                        'translation_domain' => 'AppBundle'
                ))        
                ->add('linetasks','collection', array(
                'type'         => new LineTaskType(),                
                'label'         => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                ))
                ->add('save', SubmitType::class, array(
                'label'=>'task.form.save',
                'translation_domain' => 'AppBundle',
                'attr'   =>  array(
                        'class'   => 'btn btn-primary glyphicon glyphicon-ok')

                ))
                ->add('saveAndAdd', SubmitType::class, array(
                'label'=>'task.form.saveAndAdd',
                'translation_domain' => 'AppBundle',
                'attr'   =>  array(
                        'class'   => 'btn btn-primary glyphicon glyphicon-ok')     
                ))        
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_task';
    }


}
