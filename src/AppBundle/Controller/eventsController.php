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
        
    }
}
