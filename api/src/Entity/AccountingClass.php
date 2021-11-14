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
 * @ApiResource(mercure="true",
 *      collectionOperations={"get","post"},
 *     itemOperations={
 *     "get",
 *      "put",
 *     "delete"
 *    },
 *     shortName="classes"
 * )
 */
class AccountingClass extends BaseEntity
{
	use IntIdentifier;

	/** @ORM\Column(type="string",length=1,unique=true) */
	private string $ident;

	/** @ORM\Column(type="string", length=255) */
	private string $name;

	/**
	 * @ORM\OneToMany(targetEntity=AccountingGroup::class, mappedBy="accountingClass")
	 *
	 * @ApiSubresource()
	 * @var Collection<AccountingGroup>
	 */
	private Collection $accountingGroups;

	public function __construct()
	{
		$this->accountingGroups = new ArrayCollection();
	}

	use Auditable;

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

	/**
	 * @return Collection<AccountingGroup>
	 */
	public function getAccountingGroups(): Collection
	{
		return $this->accountingGroups;
	}

	public function addAccountingGroup(AccountingGroup $accountingGroup): self
	{
		if (!$this->accountingGroups->contains($accountingGroup)) {
			$this->accountingGroups[] = $accountingGroup;
			$accountingGroup->setAccountingClass($this);
		}

		return $this;
	}

	public function removeAccountingGroup(AccountingGroup $accountingGroup): self
	{
		if ($this->accountingGroups->removeElement($accountingGroup)) {
			// set the owning side to null (unless already changed)
			if ($accountingGroup->getAccountingClass() === $this) {
				$accountingGroup->setAccountingClass(null);
			}
		}

		return $this;
	}
}
