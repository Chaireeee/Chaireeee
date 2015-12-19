<?php

namespace GenerateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class Stype4Type extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('fond',new PictureType())
            ->add('texte1', 'ckeditor', array(
                'config_name' => 'my_config',
            ))
            ->add('texte2', 'ckeditor', array(
                'config_name' => 'my_config',
            ))
            ->add('texte3', 'ckeditor', array(
                'config_name' => 'my_config',
            ))
            ->add('save','submit')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GenerateurBundle\Entity\Stype4'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'generateurbundle_stype4_edit';
    }
}