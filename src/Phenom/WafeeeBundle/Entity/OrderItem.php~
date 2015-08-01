<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;


/**
 * OrderItem
 *
 * @ORM\Table(name="orderItem")
 * @ORM\Entity(repositoryClass="Phenom\WafeeeBundle\Entity\OrderItemRepository")
 */
class OrderItem
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
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     * @Assert\GreaterThanOrEqual(value = 0)
     *
     */
    private $quantity;


    /**
     * @ManyToOne(targetEntity="Orders")
     * @JoinColumn(name="order_id", referencedColumnName="id")
     **/
    private $order_id;

    /**
     * @ManyToOne(targetEntity="Product")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     **/
    private $product_id;


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
     * Set quantity
     *
     * @param integer $quantity
     * @return OrderItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set order_id
     *
     * @param \Phenom\WafeeeBundle\Entity\Orders $orderId
     * @return OrderItem
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

    /**
     * Set product_id
     *
     * @param \Phenom\WafeeeBundle\Entity\Product $productId
     * @return OrderItem
     */
    public function setProductId(\Phenom\WafeeeBundle\Entity\Product $productId = null)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get product_id
     *
     * @return \Phenom\WafeeeBundle\Entity\Product 
     */
    public function getProductId()
    {
        return $this->product_id;
    }
}
