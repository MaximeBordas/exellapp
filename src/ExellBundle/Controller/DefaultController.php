<?php

namespace ExellBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ExellBundle:Default:index.html.twig');
    }
}
