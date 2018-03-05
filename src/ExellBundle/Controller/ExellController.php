<?php

namespace ExellBundle\Controller;

use ExellBundle\Entity\Bien;
use ExellBundle\Entity\Departement;
use ExellBundle\Form\Type\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\DBALException;
use Symfony\Component\HttpFoundation\Response;
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
        $this->addFlash('success','Le bien à éré ajouté a votre compte. Vous allez être contacté le plus tôt possible');
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


    /**
     * @Route("/autocomplete", name="departement_autocomplete")
     */
    public function autocompleteAction(Request $request)
    {
        $names = array();
        $term = trim(strip_tags($request->get('term')));

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ExellBundle:Departement')->createQueryBuilder('c')
            ->where('c.nomDepartement LIKE :nomDepartement')
            ->setParameter('nomDepartement', '%'.$term.'%')
            ->getQuery()
            ->getResult();

        foreach ($entities as $entity)
        {
            $names[] = $entity->getNomDepartement()."({$entity->getNomDepartement()})";
        }

        $response = new JsonResponse();
        $response->setData($names);

        return $response;
    }


}
