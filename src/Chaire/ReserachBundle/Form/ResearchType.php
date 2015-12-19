<?php

namespace Chaire\ReserachBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Chaire\FormationBundle\Form\photoType;

class ResearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('nameEn')
            ->add('concept')
            ->add('conceptEn')
            ->add('logo', new photoType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Chaire\ReserachBundle\Entity\Research'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chaire_reserachbundle_research';
    }
}
