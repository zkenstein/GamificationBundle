<?php

namespace TMSolution\GamificationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eventcounter
 *
 * @ORM\Table(name="eventcounter")
 * @ORM\Entity
 */
class Eventcounter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var float
     *
     * @ORM\Column(name="counter", type="float", precision=10, scale=0, nullable=true)
     */
    protected $counter;

   /**
     * @var \TMSolution\GamificationBundle\Entity\Objectinstance
     *
     * @ORM\ManyToOne(targetEntity="TMSolution\GamificationBundle\Entity\Objectinstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="objectinstance", referencedColumnName="id")
     * })
     */
    protected $objectInstance;

    /**
     * @var \TMSolution\GamificationBundle\Entity\Event
     *
     * @ORM\ManyToOne(targetEntity="TMSolution\GamificationBundle\Entity\Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="event", referencedColumnName="id")
     * })
     */
    protected $event;



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
     * Set counter
     *
     * @param float $counter
     * @return Eventcounter
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;

        return $this;
    }

    /**
     * Get counter
     *
     * @return float 
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * Set objectinstance
     *
     * @param \TMSolution\GamificationBundle\Entity\Objectinstance $objectinstance
     * @return Eventcounter
     */
    public function setObjectInstance(\TMSolution\GamificationBundle\Entity\Objectinstance $objectinstanceid = null)
    {
        $this->objectInstance = $objectinstance;

        return $this;
    }

    /**
     * Get objectinstance
     *
     * @return \TMSolution\GamificationBundle\Entity\Objectinstance 
     */
    public function getObjectInstance()
    {
        return $this->objectInstance;
    }

    /**
     * Set event
     *
     * @param \TMSolution\GamificationBundle\Entity\Event $event
     * @return Eventcounter
     */
    public function setEvent(\TMSolution\GamificationBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \TMSolution\GamificationBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
}