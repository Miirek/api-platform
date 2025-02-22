<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\SyntheticAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SyntheticAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method SyntheticAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method SyntheticAccount[]    findAll()
 * @method SyntheticAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SyntheticAccountRepository extends BaseRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, SyntheticAccount::class);
	}

	// /**
	//  * @return SyntheticAccount[] Returns an array of SyntheticAccount objects
	//  */
	/*
	public function findByExampleField($value)
	{
		return $this->createQueryBuilder('s')
			->andWhere('s.exampleField = :val')
			->setParameter('val', $value)
			->orderBy('s.id', 'ASC')
			->setMaxResults(10)
			->getQuery()
			->getResult()
		;
	}
	*/

	/*
	public function findOneBySomeField($value): ?SyntheticAccount
	{
		return $this->createQueryBuilder('s')
			->andWhere('s.exampleField = :val')
			->setParameter('val', $value)
			->getQuery()
			->getOneOrNullResult()
		;
	}
	*/
}
