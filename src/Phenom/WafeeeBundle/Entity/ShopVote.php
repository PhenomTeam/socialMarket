<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * ShopVote
 *
 * @ORM\Table(name="shopVote")
 * @ORM\Entity(repositoryClass="Phenom\WafeeeBundle\Entity\ShopVoteRepository")
 */
class ShopVote
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
     * @JoinColumn(name="shop_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $shop_id;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $user_id;

    /**
     * @ManyToOne(targetEntity="ShopVotePoint")
     * @JoinColumn(name="shopvote_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $shopvote_id;


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
     * Set shop_id
     *
     * @param \Phenom\WafeeeBundle\Entity\Shop $shopId
     * @return ShopVote
     */
    public function setShopId(\Phenom\WafeeeBundle\Entity\Shop $shopId = null)
    {
        $this->shop_id = $shopId;

        return $this;
    }

    /**
     * Get shop_id
     *
     * @return \Phenom\WafeeeBundle\Entity\Shop 
     */
    public function getShopId()
    {
        return $this->shop_id;
    }

    /**
     * Set user_id
     *
     * @param \Phenom\WafeeeBundle\Entity\User $userId
     * @return ShopVote
     */
    public function setUserId(\Phenom\WafeeeBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return \Phenom\WafeeeBundle\Entity\User 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set shopvote_id
     *
     * @param \Phenom\WafeeeBundle\Entity\ShopVotePoint $shopvoteId
     * @return ShopVote
     */
    public function setShopvoteId(\Phenom\WafeeeBundle\Entity\ShopVotePoint $shopvoteId = null)
    {
        $this->shopvote_id = $shopvoteId;

        return $this;
    }

    /**
     * Get shopvote_id
     *
     * @return \Phenom\WafeeeBundle\Entity\ShopVotePoint 
     */
    public function getShopvoteId()
    {
        return $this->shopvote_id;
    }
}
