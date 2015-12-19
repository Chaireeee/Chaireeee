<?php

namespace GenerateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class Stype6Type extends AbstractType
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

            ->add('photo1',new PictureType())
            ->add('photo2',new PictureType())
            ->add('photo3',new PictureType())
            ->add('save','submit')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GenerateurBundle\Entity\Stype6'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'generateurbundle_stype6';
    }
}