<?php

namespace Chaire\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Chaire\AdminBundle\Form\AddressType;
use Chaire\AdminBundle\Entity\Address;
use Chaire\FormationBundle\Form\photoType;

class EventType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('eventName','text',array('label'=>'Event name in native langage: '))
            ->add('eventNameEn','text',array('label'=>'Event name in english: '))


            ->add('eventDescription', 'ckeditor', array(
                'config_name' => 'my_config',
            ),array('label'=>'Event description in native langage: '))

            ->add('eventDescriptionEn', 'ckeditor', array(
                'config_name' => 'my_config',
            ),array('label'=>'Event description in english: '))

            ->add('eventDate',null,array('label'=>'Event date: '))

            ->add('eventAddress', new AddressType(),array('label'=>'Event adress: '))
            ->add('logo', new photoType())

            ->add('Save',      'submit',array('label'=>'Save','attr' => array('class' => 'btn btn-success btn-group-justified'),))
        ;
    }


    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Chaire\EventBundle\Entity\Event'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chaire_eventbundle_event';
    }
}
