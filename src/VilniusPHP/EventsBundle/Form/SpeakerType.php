<?php

namespace VilniusPHP\EventsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SpeakerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('topic')
            ->add('linkedInUrl', null, array(
                'label' => 'LinkedIn URL',
                'required' => false
            ))
            ->add('event')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VilniusPHP\EventsBundle\Entity\Speaker'
        ));
    }

    public function getName()
    {
        return 'vilniusphp_eventsbundle_speakertype';
    }
}
