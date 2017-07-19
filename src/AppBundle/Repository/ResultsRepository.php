<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Repository;
use Doctrine\ORM\Repository\RepositoryFactory;
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
}
