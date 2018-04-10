<?php

namespace ExellBundle\Controller;

use ExellBundle\Entity\Bien;
use ExellBundle\Entity\Utilisateur;
use ExellBundle\Form\Type\CarteIdentiteType;
use ExellBundle\Form\Type\SearchType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\DBALException;
use Symfony\Component\Routing\Annotation\Route;


class ExellController extends Controller
{

    /**
     * @Route("/",name="exell_homepage")
     */
    public function indexAction()
    {
        return $this->render('ExellBundle:ExellFront:index.html.twig');
    }

    /**
     * @Route("/list",name="exell_list")
     */
    public function showAllProductAction(Request $request){

            $bien  = new  Bien();
            $form = $this->createForm(SearchType::class,$bien);
            $form->handleRequest($request);
            if ( $form->isSubmitted() && $form->isValid())
            {
                $typeInvest = $bien->getTypeinvest();
                $dep = $bien->getDepartement();

                $repository = $this->getDoctrine()->getManager()->getRepository('ExellBundle:Bien');
                $searchedBien = $repository->findByDepartementAndTypeInvest($typeInvest,$dep);
                return $this->render('ExellBundle:ExellFront:consultSelected.html.twig',array('selectedBien'=>$searchedBien));
            }
        $formview = $form->createView();

        $repository = $this->getDoctrine()->getManager()->getRepository('ExellBundle:Bien');
        $listLot = $repository->findAll();

        return $this->render('ExellBundle:ExellFront:consultList.html.twig', array('LesBiens'=>$listLot,'form'=>$formview));
    }

    /**
     * @Route("/lot/{id}",name="exell_showlot",requirements={"id"="\d*"})
     */
    public function showProductAction(Request $request,Bien $bien){

        return $this->render('ExellBundle:ExellFront:consult.html.twig',array('leBien'=>$bien));
    }

    /**
     * @Route("/account",name="exell_account")
     */
    public function showAccountAction(){


        return $this->render('ExellBundle:ExellFront:account.html.twig');
    }


    /**
     * @Route("/isreserved/{id}",name="exell_reserver",requirements={"id"="\d+"})
     */
    public function addReservationAction(Bien $bien)
    {

        try
        {
            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();
            $user = $user->addLesBien($bien);

            $em->persist($user);
            $em->flush();
        }
        catch (DBALException $e){
            $this->addFlash('danger', 'Le bien à déjà été ajouté a votre compte.');
            return $this->redirect($this->generateUrl('exell_account'));

        }
        $this->addFlash('success','Le bien à été ajouté a votre compte. Vous allez être contacté le plus tôt possible');
        return $this->render('@Exell/ExellFront/account.html.twig');
    }

    /**
     * @Route("/isdeleted/{id}",name="exell_delete",requirements={"id"="\d+"})
     */
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


    public function howToReserverAction(){
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/documents" ,name="documents_user")
     */
    public function addPiecesAFournirAction(Request $request){

        $user = $this->getUser();

        $form = $this->createForm(CarteIdentiteType::class,$user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $formView = $form->createView();
            return $this->render('@Exell/ExellFront/documents.html.twig',array(
                'form'=> $formView,
            ));
        }
        $formView = $form->createView();

        $cni = $user->getCarteIdentite();
       return $this->render('@Exell/ExellFront/documents.html.twig', array(
           'form' => $formView,
           'cni' => $cni
       ));

    }

    /**
     * @throws \Nexmo\Client\Exception\Exception
     * @throws \Nexmo\Client\Exception\Request
     * @throws \Nexmo\Client\Exception\Server
     *
     * @Route("" ,name="send_sms")
     * @Method("POST")
     */
    public function sendSMSAction(Request $request){


        $uriPost = "https://rest.nexmo.com /sms/json";
        $basic  = new \Nexmo\Client\Credentials\Basic('89b7a088', 'O96FFN5VYECt9b0E');
        $client = new \Nexmo\Client($basic);


        $message = $client->message->send([
            'to' => '33632448829',
            'from' => 'Exell',
            'text' => 'Maxime'
        ]);
    }


}
