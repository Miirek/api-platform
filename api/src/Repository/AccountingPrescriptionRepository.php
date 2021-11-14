<?php

namespace App\Repository;

use App\Entity\AccountingPrescription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AccountingPrescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccountingPrescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccountingPrescription[]    findAll()
 * @method AccountingPrescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccountingPrescriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AccountingPrescription::class);
    }

    // /**
    //  * @return AccountingPrescription[] Returns an array of AccountingPrescription objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AccountingPrescription
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
