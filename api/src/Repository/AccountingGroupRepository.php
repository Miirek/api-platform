<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\AccountingGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AccountingGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccountingGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccountingGroup[]    findAll()
 * @method AccountingGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccountingGroupRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, AccountingGroup::class);
	}

	// /**
	//  * @return AccountingGroup[] Returns an array of AccountingGroup objects
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
	public function findOneBySomeField($value): ?AccountingGroup
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
