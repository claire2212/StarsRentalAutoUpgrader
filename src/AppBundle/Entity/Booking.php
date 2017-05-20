<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Car;
use AppBundle\Entity\Client;

/**
 * Booking
 *
 * @ORM\Table(name="booking")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookingRepository")
 */
class Booking
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
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime")
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="upgrade", type="boolean")
     */
    private $upgrade;

    /**
     * Many Bookings have One Car.
     * @ORM\ManyToOne(targetEntity="Car", inversedBy="bookings")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     */
    private $car;

    /**
     * Many Bookings have One Client.
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="bookings")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Booking
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Booking
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Booking
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set upgrade
     *
     * @param boolean $upgrade
     *
     * @return Booking
     */
    public function setUpgrade($upgrade)
    {
        $this->upgrade = $upgrade;

        return $this;
    }

    /**
     * Get upgrade
     *
     * @return bool
     */
    public function getUpgrade()
    {
        return $this->upgrade;
    }

    /**
     * Set car
     *
     * @param string $car
     *
     * @return car
     */
    public function setCar($car)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return string
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set client
     *
     * @param string $client
     *
     * @return client
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }
}

