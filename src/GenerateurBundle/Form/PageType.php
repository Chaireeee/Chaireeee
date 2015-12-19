<?php

namespace GenerateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use GenerateurBundle\Form\PictureType as picture;

class PageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',array('label'=>'Name'))
            ->add('baseline','text',array('label'=>'Baseline'))
            ->add('logo',new picture(),array('label'=>'Logo'))
            ->add('homie',new picture(),array('label'=>'Background picture welcome page'))
            ->add('Save',      'submit',array('label'=>'Save','attr' => array('class' => 'btn btn-success btn-group-justified'),))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GenerateurBundle\Entity\Page'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'generateurbundle_page';
    }
}
