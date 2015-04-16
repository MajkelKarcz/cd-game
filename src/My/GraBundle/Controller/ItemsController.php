<?php

namespace My\GraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\GraBundle\Entity\Items2;
use Symfony\Component\HttpFoundation\Request;
use My\GraBundle\Form\Type\ItemType;


    /**
     * @Route("/items")
     * 
     */
class ItemsController extends Controller 
{
    /**
     * @Route("/new",name="url_items")
     * 
     */
    public function newAction(Request $request)
    {
        $Item= new Items2();
        $form =$this->createForm(new ItemType(),$Item);
        $form->handleRequest($request);
        if($form->isValid()){
            $dm=$this->getDoctrine()->getManager();
            $dm->persist($Item);
            $dm->flush();   
            } 
            
        return $this->render('Item.html.twig', array('form' => $form->createView()));
    }
    
}
