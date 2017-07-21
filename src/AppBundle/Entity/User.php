<?php


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use AppBundle\Entity\Athlete;
/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
    */
    protected $id;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Athlete", cascade={"persist"})
     * 
     */
    protected $athlete;

    function getAthlete() {
        return $this->athlete;
    }
    
    function setAthlete(Athlete $athlete){
        $this->athlete = $athlete;
    }

    
    
    

    
}

