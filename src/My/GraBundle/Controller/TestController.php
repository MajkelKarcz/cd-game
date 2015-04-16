<?php

namespace My\GraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\GraBundle\Entity\testitem;
use My\GraBundle\Entity\testheroes;
use My\GraBundle\Entity\user;
use My\GraBundle\Entity\Group;
use Symfony\Component\HttpFoundation\Request;
use My\GraBundle\Form\Type\ItemType;


    /**
     * @Route("/test")
     * 
     */
class TestController extends Controller 
{
    /**
     * @Route("/new")
     * 
     */
    public function newAction(Request $request)
    {
        $hero= new testheroes();
        $form =$this->createFormBuilder($hero)
                ->add('name')
                ->add('item2')
                
        ->getForm();
        $form->handleRequest($request);
        if($form->isValid()){
            $dm=$this->getDoctrine()->getManager();
            $dm->persist($hero);
            $dm->flush();    }
        return $this->render('test.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * @Route("/newitem")
     * 
     */
    public function newitemAction(Request $request)
    {
        $item= new testitem();
        $form =$this->createFormBuilder($item)
                ->add('name')
                ->add('strbonus')
                
        ->getForm();
        $form->handleRequest($request);
        if($form->isValid()){
            $dm=$this->getDoctrine()->getManager();
            $dm->persist($item);
            $dm->flush();    }
        return $this->render('test.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * @Route("/connect")
     * 
     */
    public function connectAction()
    {
        
$item = $this->getDoctrine()->getRepository('MyGraBundle:testitem')->findOneById('1');
$hero = $this->getDoctrine()->getRepository('MyGraBundle:testheroes')->findOneById('1');

//var_dump($hero);
//$item->addCategories($hero);
$hero->addItems($item);

 $dm = $this->getDoctrine()->getManager();
        $dm->persist($hero);
        $dm->flush();
die;
       // return $this->render('test.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * @Route("/showtab")
     * 
     */
    public function showAction()
    {
        

$hero = $this->getDoctrine()->getRepository('MyGraBundle:testheroes')->findOneById('1');
$item = $hero->getItems();
$item2= $item->get('0');
$name = $item2->getName();
var_dump($name);


die;
       // return $this->render('test.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * @Route("/newuser")
     * 
     */
    public function newuserAction(Request $request)
    {
        $user= new user();
        $form =$this->createFormBuilder($user)
                ->add('name')
                
                
        ->getForm();
        $form->handleRequest($request);
        if($form->isValid()){
            $dm=$this->getDoctrine()->getManager();
            $dm->persist($user);
            $dm->flush();    }
        return $this->render('test.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * @Route("/newgroup")
     * 
     */
    public function newgroupAction(Request $request)
    {
        $group= new Group();
        $form =$this->createFormBuilder($group)
                ->add('name')
                
                
        ->getForm();
        $form->handleRequest($request);
        if($form->isValid()){
            $dm=$this->getDoctrine()->getManager();
            $dm->persist($group);
            $dm->flush();    }
        return $this->render('test2.html.twig', array('form' => $form->createView()));
    }
}
