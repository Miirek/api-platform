<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait IntIdentifier
{
	/**
	 * Identifier and a primary key
	 *
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 * @ORM\Column(type="integer")
	 */
	protected ?int $id;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function __clone()
	{
		$this->id = null;
	}
}
