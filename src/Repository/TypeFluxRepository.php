<?php

namespace App\Repository;

use App\Entity\TypeFlux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeFlux|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeFlux|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeFlux[]    findAll()
 * @method TypeFlux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeFluxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeFlux::class);
    }

    // /**
    //  * @return TypeFlux[] Returns an array of TypeFlux objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeFlux
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
