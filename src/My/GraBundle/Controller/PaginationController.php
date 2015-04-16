<?php

namespace My\GraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\GraBundle\Entity\Items2;
use My\GraBundle\Entity\Heroes2;
use Symfony\Component\HttpFoundation\Request;
use My\GraBundle\Form\Type\ItemType;


    /**
     * @Route("/pagination")
     * 
     */
class PaginationController extends Controller 
{
    /**
     * @Route("/showform",name="url_show_form")
     * 
     */
    public function showformAction(Request $request)
    {
    $form =$this->createFormBuilder()
            ->add('gold_min', 'integer')
            ->add('gold_max', 'integer')
            ->getForm();
            
        $form->handleRequest($request);
        if($form->isValid()){
            return $this->redirect($this->generateUrl('url_pagination_list'));
            } //else {
            //return $this->redirect($this->generateUrl('url_register_failed'));
            //}
            
        return $this->render('showform.html.twig', array('form' => $form->createView()));
    }   
    
    /**
     * @Route("/list",name="url_pagination_list")
     * 
     */
    public function listAction(Request $request)
    {
    $gold_min=$request->request->get('gold_min');
    $gold_max=$request->request->get('gold_max');
    echo $gold_min;
    die;
    //$em    = $this->get('doctrine.orm.entity_manager');
    //$dql   = "SELECT a FROM MyGraBundle:Heroes2 a";          
    //$query = $em->createQuery($dql);
   
// $em = $this->getDoctrine()->getManager();
//$query1 = $em->createQuery(
  //  'SELECT p
  //  FROM MyGraBundle:Heroes2 p
   // Where p.gold >= :min
   // andWhere p.gold <= :max'
    
//)->setParameter('min', $gold_min)->setParameter('max', $gold_max);

//$query = $query1->getResult();

    $dm=$this->getDoctrine()->getManager();
        $query=$dm->getRepository('MyGraBundle:Heroes2')
                ->createQueryBuilder('a')
                ->where('a.gold >= :min')
                ->andWhere('a.gold <= :max')
                ->setParameter('min', $gold_min)
                ->setParameter('max', $gold_max)
                ->getQuery()
                ->getResult();
        
    $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $request->query->get('page', 1)/*page number*/,
        10/*limit per page*/
    );

    // parameters to template
    return $this->render('pagination.html.twig', array('pagination' => $pagination));
    }   
}
