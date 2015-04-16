<?php

namespace My\GraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\GraBundle\Entity\Monsters;
use Symfony\Component\HttpFoundation\Request;
use My\GraBundle\Form\Type\MonstersType;


    /**
     * @Route("/monsters")
     * 
     */
class MonstersController extends Controller 
{
    /**
     * @Route("/new",name="url_monsters")
     * 
     */
    public function newAction(Request $request)
    {
        $Monster= new Monsters();
        $form =$this->createForm(new MonstersType(),$Monster);
        $form->handleRequest($request);
        if($form->isValid()){
            $dm=$this->getDoctrine()->getManager();
            $dm->persist($Monster);
            $dm->flush();   
            } 
            
        return $this->render('Monsters.html.twig', array('form' => $form->createView()));
    }
    
}

