<?php

namespace My\GraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\GraBundle\Entity\Heroes2;
use My\GraBundle\Entity\Items2;
use Symfony\Component\HttpFoundation\Request;
use My\GraBundle\Form\Type\RegisterType;


    /**
     * @Route("/game/play/{nick}/equipment")
     * 
     */
class EquipmentController extends Controller {
    
    /**
     * @Route("/show",name="url_equipment_show")
     * 
     */
    public function showAction($nick)
    {  
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        $weight = $Heroes->getWeight();
        $itemallitem[0] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem1());
        $itemallitem[1] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem2());
        $itemallitem[2] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem3());
        $item_ground = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItemtemp());
        
        return $this->render('equipment_show.html.twig', array('nick'=>$nick,
            'weight'=>$weight, 'itemallitem'=>$itemallitem, 'item_ground'=>$item_ground ));
    }
    /**
     * @Route("/remove_item1/{item_name}",name="url_remove_item1")
     * 
     */
    public function removeitem1Action($nick, $item_name)
    {    
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($Heroes === NULL){
            //nie ma takiego gracza
            return $this->render('loginerror.html.twig', array());
        }
        $item_ground = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findByName($Heroes->getItemtemp());
        //$items_weight = $this->get('heroes.helper')->calculate_items_weight($Heroes);
        if($Heroes->getitem1() === $item_name){
            $Heroes->setItem1('Empty');
        }else if($Heroes->getitem2() === $item_name){
            $Heroes->setItem2('Empty');
        }else if($Heroes->getitem3() === $item_name){
            $Heroes->setItem3('Empty');
        }
        
        $weight=$Heroes->getWeight();
        
        $itemallitem[0] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem1());
        $itemallitem[1] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem2());
        $itemallitem[2] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem3());
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        
        return $this->redirect($this->generateUrl("url_equipment_show", array('nick'=>$nick,
            'weight'=>$weight, 'itemallitem'=>$itemallitem, 'item_ground'=>$item_ground )));
        
    }
    
    /**
     * @Route("/insert_item1/{item_name}",name="url_insert_item1")
     * 
     */
    public function insertitem1Action($nick, $item_name) {
       $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($Heroes === NULL){
            //nie ma takiego gracza
            return $this->render('loginerror.html.twig', array());
        }
        //$items_weight = $this->get('heroes.helper')->calculate_items_weight($Heroes);
        $item_temp = $Heroes->getItemtemp();
        if($Heroes->getitem1() === $item_name){
            $Heroes->setItem1($item_temp);
            $Heroes->setItemtemp('Empty');
        }else if($Heroes->getitem2() === $item_name){
            $Heroes->setItem2($item_temp);
            $Heroes->setItemtemp('Empty');
        }else if($Heroes->getitem3() === $item_name){
            $Heroes->setItem3($item_temp);
            $Heroes->setItemtemp('Empty');
        }
        
        $weight=$Heroes->getWeight();
        $item_ground = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findByName($Heroes->getItemtemp());
        $itemallitem[0] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem1());
        $itemallitem[1] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem2());
        $itemallitem[2] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem3());
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        
        return $this->redirect($this->generateUrl("url_equipment_show", array('nick'=>$nick,
            'weight'=>$weight, 'itemallitem'=>$itemallitem, 'item_ground'=>$item_ground )));
    }
    
}

