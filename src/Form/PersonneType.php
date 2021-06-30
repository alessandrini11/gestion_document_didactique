<?php

namespace App\Form;

use App\Entity\Filiere;
use App\Entity\Personne;
use App\Entity\Post;
use App\Entity\Role;
use App\Entity\Sexe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('email')
            ->add('password',RepeatedType::class,[
                'type' => PasswordType::class,
                'invalid_message' => 'les mots de passes ne sont pas identiques',
                'required' => true,

            ])
            ->add('poste',EntityType::class,[
                'class' => Post::class,
                'choice_label' => 'nom'
            ])
            ->add('sexe',EntityType::class,[
                'class' => Sexe::class,
                'choice_label' => 'nom'
            ])
            ->add('filiere',EntityType::class,[
                'class' => Filiere::class,
                'choice_label' => 'nom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
