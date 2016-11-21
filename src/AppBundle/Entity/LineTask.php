<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * 
 * @ORM\Table()
 * @ORM\Entity
 */

class LineTask{
	
/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
	
	/**
	 * @ORM\Column(type="integer",nullable=true)
     *              
	 */
	protected $priceLine;
	
	/**
     * 
	 * @ORM\ManyToOne(targetEntity="Task", inversedBy="linetasks")
	 * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     * @var type
	 */
	protected $task;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Product", inversedBy="lineProduct")
	 * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
	 */
	protected $products;

  


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
     * Set priceLine
     *
     * @param integer $priceLine
     * @return LineTask
     */
    public function setPriceLine($priceLine)
    {
        $this->priceLine = $priceLine;

        return $this;
    }

    /**
     * Get priceLine
     *
     * @return integer 
     */
    public function getPriceLine()
    {
        return $this->priceLine;
    }

    /**
     * Set task
     *
     * @param \AppBundle\Entity\Task $task
     * @return LineTask
     */
    public function setTask(\AppBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \AppBundle\Entity\Task 
     */
    public function getTask()
    {
        return $this->task;
    }

    

    /**
     * Set products
     *
     * @param \AppBundle\Entity\Product $products
     * @return LineTask
     */
    public function setProducts(\AppBundle\Entity\Product $products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products
     *
     * @return \AppBundle\Entity\Product 
     */
    public function getProducts()
    {
        return $this->products;
    }
}
