<?php

namespace VilniusPHP\LibraryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('subtitle')
            ->add('edition')
            ->add('author')
            ->add('description')
            ->add('homepage')
            ->add('cover')
            ->add('owners')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VilniusPHP\LibraryBundle\Entity\Book'
        ));
    }

    public function getName()
    {
        return 'vilniusphp_librarybundle_booktype';
    }
}
