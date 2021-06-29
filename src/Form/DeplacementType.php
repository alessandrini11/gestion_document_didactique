<?php

namespace App\Form;

use App\Entity\Deplacement;
use App\Entity\Document;
use App\Entity\Personne;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeplacementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('document',EntityType::class,[
                'class' => Document::class,
                'choice_label' => 'nom',

            ])
            ->add('personne',EntityType::class,[
                'class' => Personne::class,
                'choice_label' => 'nom'
            ])
            ->add('quantite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Deplacement::class,
        ]);
    }
}
