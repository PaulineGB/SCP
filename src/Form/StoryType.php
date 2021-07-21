<?php

namespace App\Form;

use App\Entity\Story;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormView;

class StoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('created_at')
            ->add('number')
            ->add('is_validated')
            ->add('slug')
            ->add('menace', null, ['choice_label' => 'name'])
            ->add('image', null, ['choice_label' => 'imageLink'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Story::class,
        ]);
    }
}
