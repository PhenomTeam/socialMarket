<?php
/**
 * Created by PhpStorm.
 * User: manhtoan
 * Date: 8/1/15
 * Time: 12:24 PM
 */

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Base class for most of our entities. Livecycle callbacks should be implemented here, if possible
 * http://www.doctrine-project.org/docs/orm/2.0/en/reference/events.html#lifecycle-callbacks
 *
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class BaseEntity
{

    /**
     * @Expose()
     * @Type("DateTime<'Y-m-d H:i:s'>")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     *
     * @Type("DateTime<'Y-m-d H:i:s'>")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * used to identify the entity over URL paths
     * @ORM\Column(name="hash", type="string", unique=true, length=255)
     * @Expose()
     * @NotBlank
     */
    private $hash;

    /**
     * used to identify the entity over URL paths
     * @ORM\Column(name="deleted", type="boolean")
     * @Expose()
     */
    private $deleted;

    public function __construct()
    {
        $this->created_at = new \DateTime('now');
        $this->updated_at = new \DateTime('now');
        $this->hash = self::generateRandomString();
        $this->deleted = false;
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->updated_at = new \DateTime('now');
    }

    public static function generateRandomString($length = 22)
    {
        $characters = '23456789abcdefghjklmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $created_at
     * @return BaseEntity
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->created_at = new \DateTime('now');
    }

    /**
     * Get created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updated_at
     * @return BaseEntity
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set hash
     *
     * @param string $hash
     * @return BaseEntity
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    public function getDeleted()
    {
        return $this->deleted;
    }

    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * @todo get object alias key
     * @return string
     */
    public abstract function getKind();
}
