<?php

namespace App\Repository;

use App\Entity\Dima;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Dima|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dima|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dima[]    findAll()
 * @method Dima[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DimaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Dima::class);
    }

    // /**
    //  * @return Dima[] Returns an array of Dima objects
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
    public function findOneBySomeField($value): ?Dima
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
