<?php

namespace App\DataFixtures;

use App\Entity\Deplacement;
use App\Entity\Document;
use App\Entity\Filiere;
use App\Entity\Personne;
use App\Entity\Post;
use App\Entity\Sexe;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Provider\DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $personnes = [];
        $filieres = [];
        $posts = [];
        $sexes = [];
        $types = [];
        $documents = [];
        for ($i = 0; $i < 2; $i++){
            $sexe = new Sexe();
            $sexe->setNom($faker->name);
            $manager->persist($sexe);
            $sexes[] = $sexe;
        }
        for ($i = 0; $i < 2; $i++){
            $filiere = new Filiere();
            $filiere->setNom($faker->name);
            $manager->persist($filiere);
            $filieres[] = $filiere;
        }
        for ($i = 0; $i < 2; $i++){
            $post = new Post();
            $post->setNom($faker->name);
            $manager->persist($post);
            $posts[] = $post;
        }
        for ($i = 0; $i < 2; $i++){
            $type = new Type();
            $type->setNom($faker->name);
            $manager->persist($type);
            $types[] = $type;
        }
        for ($i = 0; $i < 10; $i++){
            $typeP = $types[mt_rand(0,count($types) - 1 )];
            $document = new Document();
            $document->setNom($faker->name)
                ->setQuantite(4)
                ->setDisponibilite(1)
                ->setMarque($faker->name)
                ->setType($typeP)
            ;
            $manager->persist($document);
            $documents[] = $document;
        }
        for($i = 0; $i < 5; $i++ ){
            $sexeP = $sexes[mt_rand(0,count($sexes) - 1 )];
            $postP = $posts[mt_rand(0,count($posts) - 1 )];
            $filiereP = $filieres[mt_rand(0,count($filieres) - 1)];
            $personne = new Personne();
            $personne->setNom($faker->name)
                ->setPrenom($faker->lastName)
                ->setEmail($faker->email)
                ->setPassword('test')
                ->setTelephone($faker->phoneNumber)
                ->setSexe($sexeP)
                ->setFiliere($filiereP)
                ->setPoste($postP)
            ;
            $manager->persist($personne);
            $personnes[] = $personne;
        }
        for ($i = 0; $i < 15; $i++){
            $boolean = mt_rand(0,1);
            $personneP = $personnes[mt_rand(0,count($personnes) - 1 )];
            $documentP = $documents[mt_rand(0,count($documents) - 1 )];
            $deplacement = new Deplacement();
            $deplacement->setPersonne($personneP)
                ->setConfirmationRetour($boolean)
                ->setConfirmationSortie($boolean)
                ->setDemandeRetour($boolean)
                ->setQuantite(5)
                ->setDocument($documentP)
            ;
            $manager->persist($deplacement);

        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
