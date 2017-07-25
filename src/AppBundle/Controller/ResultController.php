<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;
use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Query\QueryBuilder;
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
        $meeting = $em->getRepository('AppBundle:Meeting')->findBy(['name'=>$meetingName]);
        $results = $em->getRepository('AppBundle:Result')->findBy(['meeting'=>$meeting]);
        foreach($results as $event){
            $age = 2017 - $event->getAthlete()->getBirthdate();
            if ($age <= 11){
                $coeff = 1.5;
            } elseif ($age <= 13){
                $coeff = 1.42;
            } elseif ($age <= 15){
                $coeff = 1.35;
            } elseif ($age <= 17){
                $coeff = 1.21;
            } elseif ($age <= 19){
                $coeff = 1.18;
            } elseif ($age <= 22){
                $coeff = 1.09;
            } elseif ($age <= 40){
                $coeff = 1;
            } else {
                $coeff = 1.35;
            }
 
            $time = rand(3,5)+(rand(0,100)/100);
            $points = round((1000/$time)*$coeff, 0);
            $event->setTime($time);
            $event->setpoints($points);
            $em->persist($event);
            $em->flush();}
        
        $coucou = $meetingName;
        $time = rand(3,5)+(rand(1,99)/100);
            $points = round(1000/$time);
            return $this->render('base.html.twig', ['message'=>'resultats enregistres '.$coucou]);
        }
        
        /**
         * @Route("/Results/all", name="globalResults")
         */
        public function showGlobalResultsAction(){
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare('SELECT SUM(result.points) as total, athlete.lastname, athlete.firstname FROM result inner join athlete on result.athlete_id = athlete.id inner join meeting on result.meeting_id = meeting.id WHERE YEAR(CURRENT_DATE()) = 2017 GROUP BY athlete.id ORDER BY total DESC');
            $statement->execute();
            $results = $statement->fetchAll();
            return $this->render('pages/results.html.twig',['results'=>$results]);
        }
    }

