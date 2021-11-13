<?php

declare(strict_types=1);

namespace App\Tests\Api;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\AccountingClass;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Tools\SchemaTool;

class AccountingClassTest extends ApiTestCase
{


	protected function setUp(): void
	{
		$kernel = self::bootKernel();

		/** @var EntityManager $entityManager */
		$entityManager = $kernel->getContainer()
			->get('doctrine')
			->getManager();


		$schemaTool = new SchemaTool($entityManager);

		/** @var ClassMetadata $metadata */
		$metadata = $entityManager->getMetadataFactory()->getAllMetadata();


		$schemaTool->dropSchema($metadata);
		$schemaTool->createSchema($metadata);
	}

	public function testCreateAccountingClass(): void
	{
		$response = static::createClient()->request(
			'POST',
			'/accounting_classes',
			[
				'json' => [
					"ident" => "1",
					"name" => "string",
					"ownerId" => 0,
					"lastEditor" => 0,
					"createTime" => "2021-11-11T19:17:10.00",
					"modifyTime" => "2021-11-11T19:17:10.00",
				],
			]
		);

		$this->assertResponseStatusCodeSame(201);
		$this->assertJsonContains([
			'@context' => '/contexts/AccountingClass',
			'@type' => 'AccountingClass',
			"ident" => "1",
			"name" => "string",
			"ownerId" => 0,
			"lastEditor" => 0,
			"createTime" => "2021-11-11T19:17:10+00:00",
			"modifyTime" => "2021-11-11T19:17:10+00:00",
		]);
	}
}
