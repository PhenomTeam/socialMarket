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

    /**
     * Set paymentAmount
     *
     * @param float $paymentAmount
     * @return Payment
     */
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;

        return $this;
    }

    /**
     * Get paymentAmount
     *
     * @return float 
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * Set paymentDate
     *
     * @param \DateTime $paymentDate
     * @return Payment
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * Get paymentDate
     *
     * @return \DateTime 
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * Set paymentType
     *
     * @param string $paymentType
     * @return Payment
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * Get paymentType
     *
     * @return string 
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * Set order_id
     *
     * @param \Phenom\WafeeeBundle\Entity\Orders $orderId
     * @return Payment
     */
    public function setOrderId(\Phenom\WafeeeBundle\Entity\Orders $orderId = null)
    {
        $this->order_id = $orderId;

        return $this;
    }

    /**
     * Get order_id
     *
     * @return \Phenom\WafeeeBundle\Entity\Orders 
     */
    public function getOrderId()
    {
        return $this->order_id;
    }
}
