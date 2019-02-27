<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 *
 * @ORM\Table(name="payment", indexes={@ORM\Index(name="fk_payment_2_idx", columns={"usr_id"}), @ORM\Index(name="fk_payment_1_idx", columns={"pty_id"})})
 * @ORM\Entity
 */
class Payment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="total_net", type="integer", nullable=true)
     */
    private $totalNet;

    /**
     * @var int|null
     *
     * @ORM\Column(name="total_gross", type="integer", nullable=true)
     */
    private $totalGross;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \PaymentTypes
     *
     * @ORM\ManyToOne(targetEntity="PaymentTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pty_id", referencedColumnName="id")
     * })
     */
    private $pty;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usr_id", referencedColumnName="id")
     * })
     */
    private $usr;

    /**
     * @param \PaymentTypes $pty
     */
    public function setPty(PaymentTypes $pty): void
    {
        $this->pty = $pty;
    }

    /**
     * @return \PaymentTypes
     */
    public function getPty(): PaymentTypes
    {
        return $this->pty;
    }

    /**
     * @param int|null $totalGross
     */
    public function setTotalGross(?int $totalGross): void
    {
        $this->totalGross = $totalGross;
    }

    /**
     * @return int|null
     */
    public function getTotalGross(): ?int
    {
        return $this->totalGross;
    }

    /**
     * @param int|null $totalNet
     */
    public function setTotalNet(?int $totalNet): void
    {
        $this->totalNet = $totalNet;
    }

    /**
     * @return int|null
     */
    public function getTotalNet(): ?int
    {
        return $this->totalNet;
    }

    /**
     * @param User $usr
     */
    public function setUsr(User $usr): void
    {
        $this->usr = $usr;
    }

    /**
     * @return User
     */
    public function getUsr(): User
    {
        return $this->usr;
    }


}
