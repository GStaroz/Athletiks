<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of AdminController
 *
 * @author guillaume
 */
class AdminController extends Controller {
    /**
     * 
     * @Route("/admin/events", name="controlCenter")
     */
    public function ControlCenterAction(){

        $meeting = $this->getDoctrine()->getManager()->getRepository('AppBundle:Meeting')->findAll();
        return $this->render('admin/eventCenter.html.twig', ['meeting'=> $meeting, 'message'=>$formSaver]);
    }
    
    /**
     * @Route("admin/events/new", name="newEvent")
     */
    public function createNewAction(Request $request){
        
        $form = $this->createForm(\AppBundle\Form\MeetingType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        // data is an array with "name", "email", and "message" keys
        $data = $form->getData();
    }
        return $this->render('admin/newEvent.html.twig',['form'=>$form->createView()]);
        
    }
    
    /**
     * @Route("/admin/events/{meetingName}", name="adminEvent")
     */
    public function EditEventAction($meetingName){
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AppBundle:Meeting')->findOneBy(['name'=> $meetingName]);
        $inscrits = $em->getRepository('AppBundle:Athlete')->findAll();
        return $this->render('pages/events.html.twig',['mainevent'=>$event, 'inscrits'=>$inscrits]);
    }
}   
