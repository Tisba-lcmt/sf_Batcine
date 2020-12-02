<?php

namespace App\Repository;

use App\Entity\CriticalOpinion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CriticalOpinion|null find($id, $lockMode = null, $lockVersion = null)
 * @method CriticalOpinion|null findOneBy(array $criteria, array $orderBy = null)
 * @method CriticalOpinion[]    findAll()
 * @method CriticalOpinion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CriticalOpinionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CriticalOpinion::class);
    }

    // /**
    //  * @return CriticalOpinion[] Returns an array of CriticalOpinion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CriticalOpinion
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
