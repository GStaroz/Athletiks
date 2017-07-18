<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Athlete
 *
 * @ORM\Table(name="athlete")
 * @ORM\Entity
 */
class Athlete
{
    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=128, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=128, nullable=false)
     */
    private $lastname;
    
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date", nullable=false)
     */
    private $birthdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    function getFirstname() {
        return $this->firstname;
    }

    function getUser() {
        return $this->user_id;
    }

    function getBirthdate(): \DateTime {
        return $this->birthdate;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setBirthdate(\DateTime $birthdate) {
        $this->birthdate = $birthdate;
    }

    function getLastname() {
        return $this->lastname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function getId() {
        return $this->id;
    }
    
    function setUser(User $user){
        $this->user = $user;
    }


}

