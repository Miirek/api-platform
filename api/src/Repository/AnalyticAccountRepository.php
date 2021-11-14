<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\AnalyticAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnalyticAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnalyticAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnalyticAccount[]    findAll()
 * @method AnalyticAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnalyticAccountRepository extends BaseRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, AnalyticAccount::class);
	}

	// /**
	//  * @return AnalyticAccount[] Returns an array of AnalyticAccount objects
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
	public function findOneBySomeField($value): ?AnalyticAccount
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
