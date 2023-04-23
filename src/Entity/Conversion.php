<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="conversion")
 */
class Conversion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $sourceCurrency;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $targetCurrency;

    /**
     * @ORM\Column(type="float")
     */
    private $amountConverted;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getSourceCurrency(): ?string
    {
        return $this->sourceCurrency;
    }

    public function setSourceCurrency(string $sourceCurrency): self
    {
        $this->sourceCurrency = $sourceCurrency;

        return $this;
    }

    public function getTargetCurrency(): ?string
    {
        return $this->targetCurrency;
    }

    public function setTargetCurrency(string $targetCurrency): self
    {
        $this->targetCurrency = $targetCurrency;

        return $this;
    }

    public function getAmountConverted(): ?float
    {
        return $this->amountConverted;
    }

    public function setAmountConverted(float $amountConverted): self
    {
        $this->amountConverted = $amountConverted;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }
}