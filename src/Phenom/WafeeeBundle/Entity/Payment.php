<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Payment
 *
 * @ORM\Table(name="payment")
 * @ORM\Entity(repositoryClass="Phenom\WafeeeBundle\Entity\PaymentRepository")
 */
class Payment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="PaymentAmount", type="float")
     */
    private $paymentAmount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PaymentDate", type="date")
     * @Assert\GreaterThanOrEqual("today")
     *
     */
    private $paymentDate;

    /**
     * @var string
     *
     * @ORM\Column(name="PaymentType", type="string", length=100)
     */
    private $paymentType;

    /**
     * @OneToOne(targetEntity="Orders")
     * @JoinColumn(name="order_id", referencedColumnName="id")
     **/
    private $order_id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
