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
use AppBundle\Entity\Athlete;

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
     * @Route("Events/{meetingName}/inscription", name="inscription")
     */
    public function inscriptionAction($meetingName){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if ($user){
            $athlete = new Athlete();
            $form = $this->createForm(\AppBundle\Form\InscriptionFormType::class, $athlete);
            return $this->render('../FOSUserBundle/views/Registration/register_content.html.twig', ['formAthlete'=>$form->createView()]);
        } else {
            return $this->redirectToRoute('fos_user_registration_register');
        }
        
        
        
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
