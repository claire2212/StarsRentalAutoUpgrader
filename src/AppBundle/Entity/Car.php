<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Color;
use AppBundle\Entity\CarRange;
use AppBundle\Entity\Booking;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarRepository")
 */
class Car
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="available", type="boolean")
     */
    private $available;

     /**
     * Many Cars have One Color.
     * @ORM\ManyToOne(targetEntity="Color", inversedBy="cars")
     * @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     */
    private $color;

    /**
     * Many Cars have One CarRange.
     * @ORM\ManyToOne(targetEntity="CarRange", inversedBy="cars")
     * @ORM\JoinColumn(name="car_range_id", referencedColumnName="id")
     */
    private $carRange;

    /**
     * One Car has Many Bookings.
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="car")
     */
     private $bookings;

     public function __construct() {
        $this->bookings = new ArrayCollection();
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
     * @return Car
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
     * Set available
     *
     * @param boolean $available
     *
     * @return Car
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return bool
     */
    public function getAvailable()
    {
        return $this->available;
    }

     /**
     * Set color
     *
     * @param string $color
     *
     * @return Color
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set carRange
     *
     * @param string $carRange
     *
     * @return carRange
     */
    public function setCarRange($carRange)
    {
        $this->carRange = $carRange;

        return $this;
    }

    /**
     * Get carRange
     *
     * @return string
     */
    public function getCarRange()
    {
        return $this->carRange;
    }

    /**
     * Set bookings
     *
     * @param string $bookings
     *
     * @return bookings
     */
    public function setBookings($bookings)
    {
        $this->bookings = $bookings;

        return $this;
    }

    /**
     * Get bookings
     *
     * @return string
     */
    public function getBookings()
    {
        return $this->bookings;
    }
}

