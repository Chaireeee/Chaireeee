<?php

namespace Chaire\TeamBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Chaire\FormationBundle\Form\photoType;

class TeamType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstname')


            ->add('title')
            ->add('titleEn','text',array('label'=>'Title in english '))


            ->add('bio', 'textarea',array('label'=>'Biography'))

            ->add('bioEn', 'textarea',array('label'=>'Biography in english '))

            ->add('photo', new photoType())

            ->add('twitter')
            ->add('linkedin')

            ->add('category','choice', array(
                'choices'   => array(0 => 'Team member', 1 => 'Club',2=>'Board'),
                'required'  => true,
            ))




            ->add('Save',      'submit',array('label'=>'Save','attr' => array('class' => 'btn btn-success btn-group-justified'),))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Chaire\TeamBundle\Entity\Team'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chaire_teambundle_team';
    }
}
