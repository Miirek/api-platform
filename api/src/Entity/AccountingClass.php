<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\AccountingClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="accounting_class")
 * @ORM\Entity(repositoryClass=AccountingClassRepository::class)
 * @ApiResource(mercure="true")
 */
class AccountingClass
{
	use IntIdentifier;

	/** @ORM\Column(type="string",length=1,unique=true) */
	private string $ident;

	/** @ORM\Column(type="string", length=255) */
	private string $name;

	/**
	 * @ORM\OneToMany(targetEntity=AccountingGroup::class, mappedBy="class", fetch="EXTRA_LAZY")
	 * @var Collection<AccountingGroup>
	 * @ApiSubresource()
	 */
	private Collection $groups;

	use Auditable;

	public function __construct()
	{
		$this->groups = new ArrayCollection();
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

	public function getGroups(): Collection
	{
		return $this->groups;
	}

	/**
	 * @param AccountingGroup[] $groups
	 * @return $this
	 */
	public function setGroups(array $groups): AccountingClass
	{
		$this->groups->clear();
		foreach ($groups as $group) {
			$this->groups->add($group);
		}
		return $this;
	}

	public function addGroup(AccountingGroup $group): AccountingClass
	{
		$this->groups->add($group);

		return $this;
	}
}
