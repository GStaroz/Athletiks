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
 * Description of eventsController
 *
 * @author guillaume
 */
class eventsController extends Controller {
    /**
     * @Route("/Events/Featured", name="featured")
     */
    public function showFeaturedAction(){
        $em = $this->getDoctrine()->getManager();
        $featured = $em->getRepository('AppBundle:Meeting')->findMostRecent();
        $inscrits = $em->getRepository('AppBundle:Athlete')->findAll();
        $Events = $em->getRepository('AppBundle:Meeting')->findAll();
        return $this->render('pages/featured.html.twig', ['featured'=>$featured, 'inscrits'=>$inscrits, 'events'=>$Events]);
    }
    
    /**
     * @Route("Events/{meetingName}", name="event") 
     */
    public function showEventAction($meetingName){
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AppBundle:Meeting')->findOneBy(['name'=> $meetingName]);
        $inscrits = $em->getRepository('AppBundle:Athlete')->findAll();
        $Events = $em->getRepository('AppBundle:Meeting')->findAll();
        if (!$event){
            throw $this->createNotFoundException('genus not found O:');
        }
        return $this->render('pages/events.html.twig',['events'=>$Events, 'mainevent'=>$event, 'inscrits'=>$inscrits]);
    }
}
