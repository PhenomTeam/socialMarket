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

    /**
     * Set votePoint
     *
     * @param integer $votePoint
     * @return CommentVote
     */
    public function setVotePoint($votePoint)
    {
        $this->votePoint = $votePoint;

        return $this;
    }

    /**
     * Get votePoint
     *
     * @return integer 
     */
    public function getVotePoint()
    {
        return $this->votePoint;
    }

    /**
     * Set comment_id
     *
     * @param \Phenom\WafeeeBundle\Entity\Comment $commentId
     * @return CommentVote
     */
    public function setCommentId(\Phenom\WafeeeBundle\Entity\Comment $commentId = null)
    {
        $this->comment_id = $commentId;

        return $this;
    }

    /**
     * Get comment_id
     *
     * @return \Phenom\WafeeeBundle\Entity\Comment 
     */
    public function getCommentId()
    {
        return $this->comment_id;
    }

    /**
     * Set user_id
     *
     * @param \Phenom\WafeeeBundle\Entity\User $userId
     * @return CommentVote
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
