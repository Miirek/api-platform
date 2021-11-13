<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait Auditable
{
	/**
	 * Owner ID
	 *
	 * @ORM\Column(type="integer")
	 */
	private int $ownerId;

	/**
	 * Last editor ID
	 *
	 * @var int | null
	 * @ORM\Column(type="integer", nullable=true)
	 */
	private ?int $lastEditor = null;

	/**
	 * Creation time
	 *
	 * @ORM\Column(type="datetime")
	 */
	private DateTime $createTime;

	/**
	 * Time of last modification
	 *
	 * @var DateTime | null
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private ?DateTime $modifyTime = null;


	/**
	 * @return int
	 */
	public function getOwnerId(): int
	{
		return $this->ownerId;
	}

	/**
	 * @param int $ownerId
	 * @return self
	 */
	public function setOwnerId(int $ownerId): self
	{
		$this->ownerId = $ownerId;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getLastEditor(): ?int
	{
		return $this->lastEditor;
	}

	/**
	 * @param int $lastEditor
	 * @return self
	 */
	public function setLastEditor(int $lastEditor): self
	{
		$this->lastEditor = $lastEditor;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getCreateTime(): DateTime
	{
		return $this->createTime;
	}

	/**
	 * @param DateTime $createTime
	 * @return self
	 */
	public function setCreateTime(DateTime $createTime): self
	{
		$this->createTime = $createTime;
		return $this;
	}

	/**
	 * @return ?DateTime
	 */
	public function getModifyTime(): ?DateTime
	{
		return $this->modifyTime;
	}

	/**
	 * @param DateTime $modifyTime
	 * @return self
	 */
	public function setModifyTime(DateTime $modifyTime): self
	{
		$this->modifyTime = $modifyTime;
		return $this;
	}
}
