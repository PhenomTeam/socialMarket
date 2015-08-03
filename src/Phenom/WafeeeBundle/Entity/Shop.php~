<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Shop
 *
 * @ORM\Table(name="shop")
 * @ORM\Entity(repositoryClass="Phenom\WafeeeBundle\Entity\ShopRepository")
 */
class Shop extends MediaEntity implements ContentCDNInterface
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
     * @ORM\Column(name="name", type="string", length=100)
     * @Assert\Blank()
     *
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="avatarName", type="string", length=255, nullable=true)
     *
     */
    private $avatarName;

    /**
     *
     * @Assert\File(maxSize="2024k", mimeTypes={"image/jpeg", "image/png", "image/bmp", "image/gif"})
     */
    private $avatarFile;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500)
     */
    private $description;


    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
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
     * Set name
     *
     * @param string $name
     * @return Shop
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Shop
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set user_id
     *
     * @param \Phenom\WafeeeBundle\Entity\User $userId
     * @return Shop
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
     * Set avatarName
     *
     * @param string $avatarName
     * @return Shop
     */
    public function setAvatarName($avatarName)
    {
        $this->avatarName = $avatarName;

        return $this;
    }

    /**
     * Get avatarName
     *
     * @return string 
     */
    public function getAvatarName()
    {
        return $this->avatarName;
    }

    /**
     * @todo get object alias key
     * @return string
     */
    public function getKind()
    {
        // TODO: Implement getKind() method.
        return "shop";
    }

    public function uploadFile($adapter)
    {
        // TODO: Implement uploadFile() method.
    }

    public function deleteFile($adapter)
    {
        // TODO: Implement deleteFile() method.
    }

    public function getFile()
    {
        // TODO: Implement getFile() method.
        return $this->getAbsolutePath($this->avatarName);
    }

    public function setAvatarFile(UploadedFile $avatarFile)
    {
        $this->avatarFile = $avatarFile;
        $this->avatarName = str_replace(" ", "_", $avatarFile->getClientOriginalName());
        try {
            if(is_object($this->avatarFile))
            {
                $this->avatarFile->move($this->getUploadDir(), $this->avatarName);
                $this->avatarFile = null;
            }
        } catch (\Exception $e) {

        }
    }

    /**
     * @return mixed
     */
    public function getAvatarFile()
    {
        return $this->avatarFile;
    }

}
