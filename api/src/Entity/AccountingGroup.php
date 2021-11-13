<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AccountingGroupRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccountingGroupRepository::class)
 * @ApiResource
 */
class AccountingGroup
{
	use IntIdentifier;

	/**
	 * @ORM\ManyToOne(targetEntity="AccountingClass", inversedBy="groups", fetch="EXTRA_LAZY")
	 * @ORM\JoinColumn(name="class", referencedColumnName="ident",onDelete="CASCADE")
	 */
	private AccountingClass $class;

	/** @ORM\Column(type="string", length=1) */
	private string $ident;

	/** @ORM\Column(type="string", length=255) */
	private string $name;

	use Auditable;

	/**
	 * @return AccountingClass
	 */
	public function getClass(): AccountingClass
	{
		return $this->class;
	}

	/**
	 * @param AccountingClass $class
	 * @return AccountingGroup
	 */
	public function setClass(AccountingClass $class): AccountingGroup
	{
		$this->class = $class;
		return $this;
	}

	public function getIdent(): ?string
	{
		return $this->ident;
	}

	public function setIdent(string $ident): self
	{
		$this->ident = $ident;

		return $this;
	}

	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}
}
