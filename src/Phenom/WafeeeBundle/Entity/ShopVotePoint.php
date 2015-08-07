<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShopVotePoint
 *
 * @ORM\Table(name="shopVotePoint")
 * @ORM\Entity(repositoryClass="Phenom\WafeeeBundle\Entity\ShopVotePointRepository")
 */
class ShopVotePoint
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
     * @ORM\Column(name="votepoint", type="integer")
     */
    private $votepoint;

    /**
     * @var integer
     *
     * @ORM\Column(name="numofvotes", type="integer")
     */
    private $numofvotes;


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
     * Set votepoint
     *
     * @param float $votepoint
     * @return ShopVotePoint
     */
    public function setVotepoint($votepoint)
    {
        $this->votepoint = $votepoint;

        return $this;
    }

    /**
     * Get votepoint
     *
     * @return float
     */
    public function getVotepoint()
    {
        return $this->votepoint;
    }

    /**
     * Set numofvotes
     *
     * @param integer $numofvotes
     * @return ShopVotePoint
     */
    public function setNumofvotes($numofvotes)
    {
        $this->numofvotes = $numofvotes;

        return $this;
    }

    /**
     * Get numofvotes
     *
     * @return integer 
     */
    public function getNumofvotes()
    {
        return $this->numofvotes;
    }
}
