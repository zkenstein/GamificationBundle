<?php

namespace TMSolution\GamificationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrophyType
 *
 * @ORM\Table(name="gamification_trophyType")
 * @ORM\Entity
 */
class TrophyType{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return TrophyType
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * __toString method
     *
     * return string
     */
    public function __toString()
    {
        return (string)$this->getName();
    }





}