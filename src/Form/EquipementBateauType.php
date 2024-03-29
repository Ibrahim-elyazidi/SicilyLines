<?php

namespace App\Form;

use App\Entity\EquipementBateau;
use App\Entity\Bateau;
use App\Entity\Equipement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipementBateauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantite')
            ->add('equipement', EntityType::class, [
                'class'=> Equipement::class,
                'choice_label'=> 'libelle',
            ])
            ->add('bateau', EntityType::class, [
                'class'=> Bateau::class,
                'choice_label'=> 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EquipementBateau::class,
        ]);
    }
}
