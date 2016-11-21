<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */

class Product{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	protected $id;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $wearType;
	/**
	 * @ORM\Column(type="string")
	 */
	protected $size;
	/**
	 * @ORM\Column(type="string", length=200)
	 */
	protected $colour;
	/**
	 * @ORM\Column(type="string", length=200)
	 */
	protected $sex;
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $price;
	
	/**
	 * @ORM\OneToMany(targetEntity="LineTask", mappedBy="product", cascade={"persist", "remove"})
	 */
	protected $lineProduct;
	

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lineProduct = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set wearType
     *
     * @param string $wearType
     * @return Product
     */
    public function setWearType($wearType)
    {
        $this->wearType = $wearType;

        return $this;
    }

    /**
     * Get wearType
     *
     * @return string 
     */
    public function getWearType()
    {
        return $this->wearType;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return Product
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set colour
     *
     * @param string $colour
     * @return Product
     */
    public function setColour($colour)
    {
        $this->colour = $colour;

        return $this;
    }

    /**
     * Get colour
     *
     * @return string 
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return Product
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add lineProduct
     *
     * @param \AppBundle\Entity\LineTask $lineProduct
     * @return Product
     */
    public function addLineProduct(\AppBundle\Entity\LineTask $lineProduct)
    {
        $this->lineProduct[] = $lineProduct;

        return $this;
    }

    /**
     * Remove lineProduct
     *
     * @param \AppBundle\Entity\LineTask $lineProduct
     */
    public function removeLineProduct(\AppBundle\Entity\LineTask $lineProduct)
    {
        $this->lineProduct->removeElement($lineProduct);
    }

    /**
     * Get lineProduct
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLineProduct()
    {
        return $this->lineProduct;
    }

    public function __toString(){
        return sprintf(" %s %s %s %s",$this->getWearType(),$this->getSize(),$this->getColour(),$this->getSex());
    }
}
