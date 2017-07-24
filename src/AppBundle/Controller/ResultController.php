<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;
use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Description of ResultController
 *
 * @author guillaume
 */
class ResultController extends Controller{
    
    /**
     * @Route("/Results", name="results")
     */
    public function showResultsPerMeetingAction() {
        $em = $this->getDoctrine()->getManager();
        $Events = $em->getRepository('AppBundle:Meeting')->findAll();
        $Results = $em->getRepository('AppBundle:Result')->findAllOrderedByPoints();
        
        
        return $this->render('pages/results.html.twig', ['events'=>$Events, 'results'=>$Results]);
    }
    
    /**
     * @Route("/Results/setResults/{meetingName}", name="setResults") 
     */
    public function setResultsAction($meetingName){
        $em = $this->getDoctrine()->getManager();
        $meeting = $em->getRepository('AppBundle:Result')->findByMeeting($meetingName);
        foreach($meeting as $event){
            $time = rand(1,100)/100;
            $points = 1000/$time;
            $event->setTime($time);
            $event->setpoints($points);
            $em->persist($event);
            $em->flush();}
            return $this->render('base.html.twig', ['message'=>'resultats enregistres']);
        }
    }

