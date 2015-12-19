<?php

namespace Chaire\AccueilBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HighlightType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('baseLine')
            ->add('link')
            ->add('filephoto', 'file')
            ->add('activated')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Chaire\AccueilBundle\Entity\Highlight'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chaire_accueilbundle_highlight';
    }
}
