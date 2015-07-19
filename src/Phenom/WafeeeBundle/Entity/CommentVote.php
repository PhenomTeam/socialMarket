<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * CommentVote
 *
 * @ORM\Table(name="commentVote")
 * @ORM\Entity(repositoryClass="Phenom\WafeeeBundle\Entity\CommentVoteRepository")
 */
class CommentVote
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
     * @ORM\Column(name="votePoint", type="integer")
     */
    private $votePoint;

    /**
     * @ManyToOne(targetEntity="Comment")
     * @JoinColumn(name="comment_id", referencedColumnName="id")
     **/
    private $comment_id;


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
