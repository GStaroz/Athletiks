<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Description of AdminController
 *
 * @author guillaume
 */
class AdminController extends Controller {
    /**
     * 
     * @Route("/admin/events")
     */
    public function ControlCenterAction(){
        return $this->render('admin/eventCenter.html.twig');
    }
}
