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
}
