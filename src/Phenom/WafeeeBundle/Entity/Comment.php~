<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="Phenom\WafeeeBundle\Entity\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CreateDate", type="date")
     * @Assert\GreaterThanOrEqual("today")
     *
     */
    private $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UpdateDate", type="date")
     * @Assert\GreaterThanOrEqual("today")
     *
     */
    private $updateDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Type", type="boolean")
     */
    private $type;


    /**
     * @ManyToOne(targetEntity="Product")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     **/
    private $product_id;

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

    /**
     * Set content
     *
     * @param string $content
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     * @return Comment
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime 
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     * @return Comment
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime 
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set type
     *
     * @param boolean $type
     * @return Comment
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set product_id
     *
     * @param \Phenom\WafeeeBundle\Entity\Product $productId
     * @return Comment
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

    /**
     * Set shop_id
     *
     * @param \Phenom\WafeeeBundle\Entity\Shop $shopId
     * @return Comment
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
     * @return Comment
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
}
