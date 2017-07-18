<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
/**
 * Description of EventsRepository
 *
 * @author guillaume
 */
class EventsRepository extends EntityRepository {
    
    /*
     * return Meeting[]
     */
    public function findMostRecent(){
        
        $today = new \DateTime('now');
        return $this->createQueryBuilder('meeting')
                ->andWhere('meeting.date >= :tomorrow')
                ->setParameter('tomorrow', $today)
                ->orderBy('meeting.date', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->execute();
    }
}
