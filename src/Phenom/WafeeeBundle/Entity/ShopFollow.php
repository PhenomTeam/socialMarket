<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * ShopFollow
 *
 * @ORM\Table(name="shopFollow")
 * @ORM\Entity(repositoryClass="Phenom\WafeeeBundle\Entity\ShopFollowRepository")
 */
class ShopFollow
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
     * @ManyToOne(targetEntity="Shop")
     * @JoinColumn(name="shop_id", referencedColumnName="id")
     **/
    private $shop_id;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user_id;


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
