<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Phenom\WafeeeBundle\Entity\CategoryRepository")
 */
class Category
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
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500)
     */
    private $description;


    /**
     * @ManyToOne(targetEntity="Shop")
     * @JoinColumn(name="shop_id", referencedColumnName="id")
     **/
    private $shop_id;

    /**
     * @ManyToMany(targetEntity="Product")
     * @JoinTable(name="category_product",
     *      joinColumns={@JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@JoinColumn(name="product_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     **/
    private $products;


    public function __construct()
    {
        $this->products = new ArrayCollection();
    }


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
     * @return Category
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
     * @return Category
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
     * Set shop_id
     *
     * @param \Phenom\WafeeeBundle\Entity\Shop $shopId
     * @return Category
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
     * Add products
     *
     * @param \Phenom\WafeeeBundle\Entity\Product $products
     * @return Category
     */
    public function addProduct(\Phenom\WafeeeBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Phenom\WafeeeBundle\Entity\Product $products
     */
    public function removeProduct(\Phenom\WafeeeBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
}
