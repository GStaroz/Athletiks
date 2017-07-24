<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Repository;
use Doctrine\ORM\Repository\RepositoryFactory;
use AppBundle\Entity\Athlete;
use AppBundle\Entity\Meeting;
/**
 * Description of ResultsRepository
 *
 * @author guillaume
 */
class ResultsRepository extends \Doctrine\ORM\EntityRepository {
    
    /**
     * return Result[]
     */
    public function findAllOrderedByPoints(){
        return $this->createQueryBuilder('result')
                ->orderBy('result.points', 'DESC')
                ->getQuery()
                ->execute();
    }
    
    /**
     * return Result[]
     */
    public function findDuplicate(Athlete $athlete, Meeting $meeting){
        return $this->getEntityManager()
                ->createQuery('SELECT p FROM AppBundle:Result p WHERE p.meeting = :meeting AND p.athlete = :athlete')
                ->setParameter('meeting', $meeting)
                ->setParameter('athlete', $athlete)
                ->getResult();
    }
    
    /**
     * return Result[]
     */
    public function findByMeeting($meetingName){
        return $this->createQueryBuilder('result')
                ->where('result.meeting = :meeting')
                ->setParameter('meeting', $meetingName)
                ->getQuery()
                ->execute();
    }
}
