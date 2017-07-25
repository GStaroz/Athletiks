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
use AppBundle\Entity\Result;
use AppBundle\Form\MeetingType;

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
        $featured = $em->getRepository('AppBundle:Meeting')->findMostRecent()->getName();
        $inscrits = $em->getRepository('AppBundle:Athlete')->findAll();
        $Events = $em->getRepository('AppBundle:Meeting')->findAll();
        return $this->redirectToRoute('event', ['meetingName'=>$featured]);
    }
    
    /**
     * @Route("Events/{meetingName}/inscription", name="inscription")
     */
    public function inscriptionAction($meetingName){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if ($user){
            $athlete = $user->getAthlete();
            $meeting = $em->getRepository('AppBundle:Meeting')->findOneBy(['name'=>$meetingName]);
            //return $this->render('base.html.twig',['message'=> $meeting]);
            $Duplicate = $em->getRepository('AppBundle:Result')->findDuplicate($athlete, $meeting);
            if ($Duplicate){
                $message = 'Vous êtes dêja inscrit pour cette course !';
                return $this->render('base.html.twig', ['message'=> $message]);
            } else {
                $message = 'Vous êtes bien inscrit pour la course de '.$meetingName;
                $resultat = new Result();
                $resultat->setAthlete($athlete);
                $resultat->setMeeting($meeting);
                $em->persist($resultat);
                $em->flush();
            return $this->render('base.html.twig', ['message'=> $message]);
            }
        } else {
            return $this->redirectToRoute('fos_user_security_login');
        }
    }
    

    /**
     * @Route("Events/{meetingName}", name="event") 
     */
    public function showEventAction($meetingName){
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AppBundle:Meeting')->findOneBy(['name'=> $meetingName]);
        $inscrits = $em->getRepository('AppBundle:Result')->findAll();
        $Events = $em->getRepository('AppBundle:Meeting')->findAll();
        if (!$event){
            throw $this->createNotFoundException('genus not found O:');
        }
        return $this->render('pages/events.html.twig',['events'=>$Events, 'mainevent'=>$event, 'inscrits'=>$inscrits]);
    }
    
    
}
