<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\AccountingGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="accounting_group")
 * @ORM\Entity(repositoryClass=AccountingGroupRepository::class)
 * @ApiResource(
 *      collectionOperations={"get","post"},
 *     itemOperations={
 *     "get",
 *      "put",
 *     "delete"
 *    },
 *     shortName="groups"
 *  )
 */
class AccountingGroup extends BaseEntity
{
	use IntIdentifier;

	/** @ORM\Column(type="string", length=1) */
	private string $ident;

	/** @ORM\Column(type="string", length=255) */
	private string $name;

	/**
	 * @ORM\ManyToOne(targetEntity=AccountingClass::class, inversedBy="accountingGroups")
	 * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
	 */
	private ?AccountingClass $accountingClass;

	/**
	 * @ORM\OneToMany(targetEntity=SyntheticAccount::class, mappedBy="accountingGroup", orphanRemoval=true)
	 * @ApiSubresource()
	 * @var Collection<SyntheticAccount>
	 */
	private Collection $syntheticAccounts;

	public function __construct()
	{
		$this->syntheticAccounts = new ArrayCollection();
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

	public function getAccountingClass(): ?AccountingClass
	{
		return $this->accountingClass;
	}

	public function setAccountingClass(?AccountingClass $accountingClass): self
	{
		$this->accountingClass = $accountingClass;

		return $this;
	}

	/**
	 * @return Collection|SyntheticAccount[]
	 */
	public function getSyntheticAccounts(): Collection
	{
		return $this->syntheticAccounts;
	}

	public function addSyntheticAccount(SyntheticAccount $syntheticAccount): self
	{
		if (!$this->syntheticAccounts->contains($syntheticAccount)) {
			$this->syntheticAccounts[] = $syntheticAccount;
			$syntheticAccount->setAccountingGroup($this);
		}

		return $this;
	}

	public function removeSyntheticAccount(SyntheticAccount $syntheticAccount): self
	{
		if ($this->syntheticAccounts->removeElement($syntheticAccount)) {
			// set the owning side to null (unless already changed)
			if ($syntheticAccount->getAccountingGroup() === $this) {
				$syntheticAccount->setAccountingGroup(null);
			}
		}

		return $this;
	}
}
