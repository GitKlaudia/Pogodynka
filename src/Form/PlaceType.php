<?php

namespace App\Form;

use App\Entity\Place;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class PlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Locality', null, [
                'attr' => [
                    'placeholder' => 'Enter locality name',
                ],
            ])
            ->add('Country', ChoiceType::class, [
                'choices' => [
                    'Poland' => 'PL',
                    'United States' => 'US',
                    'United Kingdom' => 'GB',
                    'France' => 'FR',
                    'Italy' => 'IT',
                    'Spain' => 'ES',
                    'Germany' => 'DE',
                ],
            ])
            ->add('Latitude', NumberType::class, [])
            ->add('Longitude', NumberType::class, [])
//            ->add('Locality')
//            ->add('Country')
//            ->add('Latitude')
//            ->add('Longitude')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Place::class,
        ]);
    }
}
