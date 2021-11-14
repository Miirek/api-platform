<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnalyticAccountRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnalyticAccountRepository::class)
 * @ApiResource(
 *      collectionOperations={"get","post"},
 *     itemOperations={
 *     "get",
 *      "put",
 *     "delete"
 *    },
 *     shortName="analytic"
 *  )
 */
class AnalyticAccount extends BaseEntity
{
	use IntIdentifier;

	/** @ORM\Column(type="string", length=3) */
	private string $ident;

	/** @ORM\Column(type="string", length=255) */
	private string $name;

	/**
	 * @ORM\ManyToOne(targetEntity=SyntheticAccount::class, inversedBy="analyticalAccounts")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private ?SyntheticAccount $syntheticAccount;

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

	public function getSyntheticAccount(): ?SyntheticAccount
	{
		return $this->syntheticAccount;
	}

	public function setSyntheticAccount(?SyntheticAccount $syntheticAccount): self
	{
		$this->syntheticAccount = $syntheticAccount;

		return $this;
	}
}
