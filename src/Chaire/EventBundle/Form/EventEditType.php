<?php

namespace Chaire\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Chaire\AdminBundle\Form\AddressType;
use Chaire\AdminBundle\Entity\Address;

class EventEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('logo')

        ;
    }




    /**
     * @return string
     */
    public function getName()
    {
        return 'chaire_eventbundle_event_edit';
    }

    public function getParent()
    {
        return new EventType();
    }
}
