<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Receivable
 *
 * @ORM\Table(name="receivable", indexes={@ORM\Index(name="fk_receivable_1_idx", columns={"usr_id"})})
 * @ORM\Entity
 */
class Receivable
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usr_id", referencedColumnName="id")
     * })
     */
    private $usr;


}
