<?php

namespace App\Repository;

use App\Entity\Deplacement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Deplacement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Deplacement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Deplacement[]    findAll()
 * @method Deplacement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeplacementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Deplacement::class);
    }

    public function deplacementSortie()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT d FROM App\Entity\Deplacement d WHERE (d.confirmation_sortie = 0 OR d.confirmation_sortie = 1)  AND d.confirmation_retour = 0 AND d.demande_retour = 0 ORDER BY d.id DESC  '
            )
            ->getResult()
            ;
    }

    public function deplacementRetour()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT d FROM App\Entity\Deplacement d WHERE (d.demande_retour = 1 OR d.demande_retour = 0)  AND d.confirmation_sortie = 1 AND d.confirmation_retour = 0 ORDER BY d.id DESC '
            )
            ->getResult()
            ;
    }
    // /**
    //  * @return Deplacement[] Returns an array of Deplacement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Deplacement
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
