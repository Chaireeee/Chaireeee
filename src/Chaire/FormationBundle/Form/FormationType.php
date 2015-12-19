<?php

namespace Chaire\FormationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Chaire\FormationBundle\Form\photoType;

class FormationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('student_escp')
            ->add('student_exte')
            ->add('executive')
            ->add('name','text',array('label'=>'Formation name in native langage: '))
            ->add('nameEn','text',array('label'=>'Formation name in English: '))

            ->add('concept', 'textarea',array('label'=>'Concept in native langage: '))

            ->add('conceptEn', 'textarea',array('label'=>'Concept in English: '))

            ->add('Logo', new photoType())
            ->add('Save',      'submit',array('label'=>'Save','attr' => array('class' => 'btn btn-success btn-group-justified'),))





        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Chaire\FormationBundle\Entity\Formation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chaire_formationbundle_formation';
    }
}
