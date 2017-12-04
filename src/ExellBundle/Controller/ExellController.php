<?php

namespace ExellBundle\Controller;

use ExellBundle\Entity\Bien;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ExellBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;

class ExellController extends Controller
{
    public function indexAction()
    {
        return $this->render('ExellBundle:ExellFront:index.html.twig');
    }

    public function showAllProductAction(){
        $repository = $this->getDoctrine()->getManager()->getRepository('ExellBundle:Bien');
        $listLot = $repository->findAll();

        return $this->render('ExellBundle:ExellFront:consultList.html.twig', array('LesBiens'=>$listLot));
    }

    public function showProductAction(Bien $bien){


        return $this->render('ExellBundle:ExellFront:consult.html.twig',array('leBien'=>$bien));
    }

    public function showAccountAction(){

        return $this->render('ExellBundle:ExellFront:account.html.twig');
    }

    public function addReservationAction(Bien $bien)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();
        $user = $user->addLesBien($bien);

        $em->persist($user);
        $em->flush();

        return $this->render('@Exell/ExellFront/account.html.twig');
    }
    public function removeReservationAction(Bien $bien)
    {
        $em = $this->getDoctrine()->getManager();



        if(!$bien ){
            throw $this->createNotFoundException('Pas de bien pour le bien avec le numéro identifiant '.$bien);
        }

        $user = $this->getUser();
        $user = $user->removeLesBien($bien);

        $em->flush();

        return $this->render('@Exell/ExellFront/account.html.twig');
    }
}
