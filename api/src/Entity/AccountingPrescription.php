<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AccountingPrescriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccountingPrescriptionRepository::class)
 * @ApiResource()
 */
class AccountingPrescription
{

	use IntIdentifier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity=AnalyticAccount::class)
     */
    private ?AnalyticAccount $creditAccount;

    /**
     * @ORM\ManyToOne(targetEntity=AnalyticAccount::class)
     */
    private ?AnalyticAccount $debitAccount;

    use Auditable;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreditAccount(): ?AnalyticAccount
    {
        return $this->creditAccount;
    }

    public function setCreditAccount(?AnalyticAccount $creditAccount): self
    {
        $this->creditAccount = $creditAccount;

        return $this;
    }

    public function getDebitAccount(): ?AnalyticAccount
    {
        return $this->debitAccount;
    }

    public function setDebitAccount(?AnalyticAccount $debitAccount): self
    {
        $this->debitAccount = $debitAccount;

        return $this;
    }
}
