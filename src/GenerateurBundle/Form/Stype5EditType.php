<?php

namespace GenerateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class Stype5EditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')


            ->add('texte1', 'ckeditor', array(
                'config_name' => 'my_config',
            ))
            ->add('texte2', 'ckeditor', array(
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
            'data_class' => 'GenerateurBundle\Entity\Stype5'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'generateurbundle_stype5_edit';
    }
}
