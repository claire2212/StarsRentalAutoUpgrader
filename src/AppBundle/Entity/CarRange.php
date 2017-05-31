<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Car;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CarRange
 *
 * @ORM\Table(name="car_range")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarRangeRepository")
 */
class CarRange
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=125, unique=true)
     */
    private $name;

    /**
     * One CarRange has Many Cars.
     * @ORM\OneToMany(targetEntity="Car", mappedBy="carRange")
     */
     private $cars;

     public function __construct() {
        $this->cars = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return CarRange
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
     * Set cars
     *
     * @param string $cars
     *
     * @return cars
     */
    public function setCars($cars)
    {
        $this->cars = $cars;

        return $this;
    }

    /**
     * Get cars
     *
     * @return string
     */
    public function getCars()
    {
        return $this->cars;
    }
}

