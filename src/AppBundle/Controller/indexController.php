<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Meeting;

/**
 * Description of indexController
 *
 * @author guillaume
 */
class indexController extends Controller {
    
    
    /**
     * @Route("/", name="homepage")
     */
    public function alleventsAction(){
        
        $today = new \DateTime('now');
        $nextWeek = $today->modify("+ 7 days");
        $em = $this->getDoctrine()->getManager();
        $meeting = $em->getRepository('AppBundle:Meeting')->findMostRecent();
        $Events = $em->getRepository('AppBundle:Meeting')->findAll();
        return $this->render('pages/home.html.twig',['today'=>$today,
            'meeting'=> $meeting,
            'nextweek'=>$nextWeek,
            'events'=>$Events]);
    }
}
