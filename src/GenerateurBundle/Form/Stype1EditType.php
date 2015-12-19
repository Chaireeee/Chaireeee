<?php

namespace GenerateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class Stype1EditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            //->add('texte','textarea')
            ->add('save','submit')

            ->add('texte', 'ckeditor', array(
                'config_name' => 'my_config',
            ))



        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GenerateurBundle\Entity\Stype1'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'generateurbundle_stype1_edit';
    }
}


