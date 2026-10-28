<?php

namespace App\Form;

use App\Entity\Measurement;
use App\Entity\Place;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Temperature')
            ->add('Humidity')
            ->add('Wind', ChoiceType::class, [
                'choices' => [
                    'Calm' => 'calm',
                    'Light' => 'light',
                    'Moderate' => 'moderate',
                    'Fresh' => 'fresh',
                    'Strong' => 'strong',
                    'Gale' => 'gale',
                    'Storm' => 'storm',
                ],
            ])
            ->add('Precipitation')
            ->add('Date')
            ->add('Place', EntityType::class, [
                'class' => Place::class,
                'choice_label' => 'Locality',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
