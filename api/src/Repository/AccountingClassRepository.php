<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\AccountingClass;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AccountingClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccountingClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccountingClass[]    findAll()
 * @method AccountingClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccountingClassRepository extends BaseRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, AccountingClass::class);
	}

	// /**
	//  * @return AccountingClass[] Returns an array of AccountingClass objects
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
	public function findOneBySomeField($value): ?AccountingClass
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
