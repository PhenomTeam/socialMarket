<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * OrderStatus
 *
 * @ORM\Table(name="orderStatus")
 * @ORM\Entity(repositoryClass="Phenom\WafeeeBundle\Entity\OrderStatusRepository")
 */
class OrderStatus
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
     * @var string
     *
     * @ORM\Column(name="statusContent", type="string", length=100)
     */
    private $statusContent;


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
