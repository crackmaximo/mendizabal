<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * 
 *
 * @ORM\Table()
 * @ORM\Entity
 */

class Task{
	
	/**
	* @var integer
	*
	* @ORM\Column(name="id", type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;
	
	
	/**
	 * @ORM\Column(type="string",nullable=true)
	 *
	 */
	protected $startDate;
	
	/**
	 * @ORM\Column(type="string",nullable=true)
	 * 
     *                 
	 *
	 */
	protected $endDate;
	
    /**
     * @ORM\Column(type="integer",nullable=true)
     *              
     */
    protected $priceFull;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="taskStatus", type="string", length=255)
	 */
	protected $taskStatus;
	
	/**
	 * @ORM\Column(type="integer",nullable=true)
	 */
	protected $accountPrice;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="statusPay", type="string", length=255)
	 */
	protected $statusPay;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="comment", type="string", length=255,nullable=true)
	 */
	protected $comment;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Client", inversedBy="tasks")
	 * @ORM\JoinColumn(name="client_id", referencedColumnName="id", nullable=false)
	 */
	protected $client;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Falla", inversedBy="tasksF")
	 * @ORM\JoinColumn(name="falla_id", referencedColumnName="id", nullable=false)
	 */
	protected $falla;

    /**
     * @ORM\OneToMany(targetEntity="LineTask", mappedBy="task", cascade={"persist"})
     */
    protected $linetasks;
    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->linetasks = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set startDate
     *
     * @param string $startDate
     * @return Task
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return string 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param string $endDate
     * @return Task
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return string 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set priceFull
     *
     * @param integer $priceFull
     * @return Task
     */
    public function setPriceFull($priceFull)
    {
        $this->priceFull = $priceFull;

        return $this;
    }

    /**
     * Get priceFull
     *
     * @return integer 
     */
    public function getPriceFull()
    {
        return $this->priceFull;
    }

    /**
     * Set taskStatus
     *
     * @param string $taskStatus
     * @return Task
     */
    public function setTaskStatus($taskStatus)
    {
        $this->taskStatus = $taskStatus;

        return $this;
    }

    /**
     * Get taskStatus
     *
     * @return string 
     */
    public function getTaskStatus()
    {
        return $this->taskStatus;
    }

    /**
     * Set accountPrice
     *
     * @param integer $accountPrice
     * @return Task
     */
    public function setAccountPrice($accountPrice)
    {
        $this->accountPrice = $accountPrice;

        return $this;
    }

    /**
     * Get accountPrice
     *
     * @return integer 
     */
    public function getAccountPrice()
    {
        return $this->accountPrice;
    }

    /**
     * Set statusPay
     *
     * @param string $statusPay
     * @return Task
     */
    public function setStatusPay($statusPay)
    {
        $this->statusPay = $statusPay;

        return $this;
    }

    /**
     * Get statusPay
     *
     * @return string 
     */
    public function getStatusPay()
    {
        return $this->statusPay;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Task
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     * @return Task
     */
    public function setClient(\AppBundle\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set falla
     *
     * @param \AppBundle\Entity\Falla $falla
     * @return Task
     */
    public function setFalla(\AppBundle\Entity\Falla $falla)
    {
        $this->falla = $falla;

        return $this;
    }

    /**
     * Get falla
     *
     * @return \AppBundle\Entity\Falla 
     */
    public function getFalla()
    {
        return $this->falla;
    }

    /**
     * Add linetasks
     *
     * @param \AppBundle\Entity\LineTask $linetasks
     * @return Task
     */
    public function addLinetask(\AppBundle\Entity\LineTask $linetasks)
    {
        $this->linetasks[] = $linetasks;
        $linetasks->setTask($this);
        return $this;
    }

    /**
     * Remove linetasks
     *
     * @param \AppBundle\Entity\LineTask $linetasks
     */
    public function removeLinetask(\AppBundle\Entity\LineTask $linetasks)
    {
        $this->linetasks->removeElement($linetasks);
    }

    /**
     * Get linetasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLinetasks()
    {
        return $this->linetasks;
    }
}
