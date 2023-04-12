<?php

namespace App\Form;

use App\Entity\Tarifer;
use App\Entity\Periode;
use App\Entity\Type;
use App\Entity\Liaison;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TariferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tarif')
            ->add('type', EntityType::class, [
                'class'=> Type::class,
                'choice_label'=> 'libelle',
            ])
            ->add('periode', EntityType::class, [
                'class'=> Periode::class,
                'choice_label'=> 'id',
            ])
            ->add('liaison', EntityType::class, [
                'class'=> Liaison::class,
                'choice_label'=> 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tarifer::class,
        ]);
    }
}
