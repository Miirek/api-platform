<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\SyntheticAccountRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SyntheticAccountRepository::class)
 * @ApiResource(
 *      collectionOperations={"get","post"},
 *     itemOperations={
 *     "get",
 *      "put",
 *     "delete"
 *    },
 *     shortName="synthetic"
 *  )
 */
class SyntheticAccount extends BaseEntity
{
	use IntIdentifier;

	/** @ORM\Column(type="string", length=1) */
	private string $ident;

	/** @ORM\Column(type="string", length=255) */
	private string $name;

	/**
	 * @ORM\ManyToOne(targetEntity=AccountingGroup::class, inversedBy="syntheticAccounts")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private ?AccountingGroup $accountingGroup;

	/**
	 * @ORM\OneToMany(targetEntity=AnalyticAccount::class, mappedBy="syntheticAccount")
	 * @var Collection<AnalyticAccount>
	 * @ApiSubresource()
	 */
	private Collection $analyticAccounts;

	use Auditable;

	public function __construct()
	{
		$this->analyticAccounts = new ArrayCollection();
	}

	public function getIdent(): string
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

	public function getAccountingGroup(): ?AccountingGroup
	{
		return $this->accountingGroup;
	}

	public function setAccountingGroup(?AccountingGroup $accountingGroup): self
	{
		$this->accountingGroup = $accountingGroup;

		return $this;
	}

	/**
	 * @return Collection<AnalyticAccount>
	 */
	public function getAnalyticAccounts(): Collection
	{
		return $this->analyticAccounts;
	}

	public function addAnalyticalAccount(AnalyticAccount $analyticalAccount): self
	{
		if (!$this->analyticAccounts->contains($analyticalAccount)) {
			$this->analyticAccounts[] = $analyticalAccount;
			$analyticalAccount->setSyntheticAccount($this);
		}

		return $this;
	}

	public function removeAnalyticalAccount(AnalyticAccount $analyticalAccount): self
	{
		if ($this->analyticAccounts->removeElement($analyticalAccount)) {
			// set the owning side to null (unless already changed)
			if ($analyticalAccount->getSyntheticAccount() === $this) {
				$analyticalAccount->setSyntheticAccount(null);
			}
		}

		return $this;
	}
}
