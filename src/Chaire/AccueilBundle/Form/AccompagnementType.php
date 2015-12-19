<?php

namespace Chaire\AccueilBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Chaire\FormationBundle\Form\photoType;

class AccompagnementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameLg',null,array('label'=>'Name native langage'))
            ->add('nameEn',null,array('label'=>'Name in english'))
            ->add('baselineLg', 'ckeditor', array(
                'config_name' => 'my_config',
            ) ,array('label'=>'baseline'))
            ->add('baselineEn', 'ckeditor', array(
                'config_name' => 'my_config',
            ) ,array('label'=>'baseline'))


            ->add('Logo', new photoType(),array('label'=>'Logo'))
            ->add('Imageentete', new photoType(),array('label'=>'Image en tete'))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Chaire\AccueilBundle\Entity\Accompagnement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chaire_accueilbundle_accompagnement';
    }
}
