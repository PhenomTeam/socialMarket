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
}
