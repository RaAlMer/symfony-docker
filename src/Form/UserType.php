<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('surname', TextType::class)
            ->add('location', TextType::class)
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'X' => 'x',
                    'Y' => 'y',
                    'Z' => 'z',
                ],
            ])
            ->add('age', TextType::class)
            ->add('isActive', CheckboxType::class, [
                'required' => false,
            ])
            ->add('createdAt', DateTimeType::class)
            ->add('updatedAt', DateTimeType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
