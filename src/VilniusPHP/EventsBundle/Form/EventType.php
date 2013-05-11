<?php

namespace VilniusPHP\EventsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('date')
            ->add('facebookUrl')
            ->add('githubUrl')
            ->add('sponsors')
            ->add('place')
            ->add('afterparty')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VilniusPHP\EventsBundle\Entity\Event'
        ));
    }

    public function getName()
    {
        return 'vilniusphp_eventsbundle_eventtype';
    }
}
