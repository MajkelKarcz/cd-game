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
        
        $item1 = $Heroes->getItem1();
        $item1_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item1);
        $item2 = $Heroes->getItem2();
        $item2_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item2);
        $item3 = $Heroes->getItem3();
        $item3_item = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item3);
        $itemtemp = $Heroes->getItemtemp();
        $itemtemp_item = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($itemtemp);
        
        return $this->render('equipment_show.html.twig', array('nick'=>$nick,
            'weight'=>$weight,  'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 
            'item1_item'=>$item1_item, 'item2_item'=>$item2_item, 'item3_item'=>$item3_item, 
            'itemtemp'=>$itemtemp, 'itemtemp_item'=>$itemtemp_item));
    }
    /**
     * @Route("/remove_item1",name="url_remove_item1")
     * 
     */
    public function removeitem1Action($nick)
    {    
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($Heroes === NULL){
            //nie ma takiego gracza
            return $this->render('loginerror.html.twig', array());
        }
        $item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneById('1'); 
        //$items_weight = $this->get('heroes.helper')->calculate_items_weight($Heroes);
        $Heroes->setItem1($item);
        $weight=$Heroes->getWeight();
        $item1=$Heroes->getItem1();
        $item1_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item1);
        $item2=$Heroes->getItem2();
        $item2_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item2);
        $item3=$Heroes->getItem3();
        $item3_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item3);
        $itemtemp = $Heroes->getItemtemp();
        $itemtemp_item = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($itemtemp);
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        
        return $this->render('equipment_show.html.twig', array('nick'=>$nick,
            'weight'=>$weight, 'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 
            'item1_item'=>$item1_item, 'item2_item'=>$item2_item, 'item3_item'=>$item3_item, 
            'itemtemp'=>$itemtemp, 'itemtemp_item'=>$itemtemp_item));
    }
    /**
     * @Route("/remove_item2",name="url_remove_item2")
     * 
     */
    public function removeitem2Action($nick)
    {    
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($Heroes === NULL){
            //nie ma takiego gracza
            return $this->render('loginerror.html.twig', array());
        }
        $item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneById('1'); 
        
        $Heroes->setItem2($item);
        $weight=$Heroes->getWeight();
        $item1=$Heroes->getItem1();
        $item1_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item1);
        $item2=$Heroes->getItem2();
        $item2_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item2);
        $item3=$Heroes->getItem3();
        $item3_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item3);
        $itemtemp = $Heroes->getItemtemp();
        $itemtemp_item = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($itemtemp);
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        
        return $this->render('equipment_show.html.twig', array('nick'=>$nick,
            'weight'=>$weight, 'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 
            'item1_item'=>$item1_item, 'item2_item'=>$item2_item, 'item3_item'=>$item3_item, 
            'itemtemp'=>$itemtemp, 'itemtemp_item'=>$itemtemp_item));
    }
    /**
     * @Route("/remove_item3",name="url_remove_item3")
     * 
     */
    public function removeitem3Action($nick)
    {    
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($Heroes === NULL){
            //nie ma takiego gracza
            return $this->render('loginerror.html.twig', array());
        }
        $item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneById('1'); 
        
        $Heroes->setItem3($item);
        $weight=$Heroes->getWeight();
        $item1=$Heroes->getItem1();
        $item1_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item1);
        $item2=$Heroes->getItem2();
        $item2_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item2);
        $item3=$Heroes->getItem3();
        $item3_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item3);
        $itemtemp = $Heroes->getItemtemp();
        $itemtemp_item = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($itemtemp);
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        
        return $this->render('equipment_show.html.twig', array('nick'=>$nick,
            'weight'=>$weight, 'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 
            'item1_item'=>$item1_item, 'item2_item'=>$item2_item, 'item3_item'=>$item3_item, 
            'itemtemp'=>$itemtemp, 'itemtemp_item'=>$itemtemp_item));
    }
    
    /**
     * @Route("/insert_item1",name="url_insert_item1")
     * 
     */
    public function insertitem1Action($nick) {
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($Heroes === NULL){
            //nie ma takiego gracza
            return $this->render('loginerror.html.twig', array());
        }
        
        $item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneById('1'); 
        $itemmoved = $Heroes->getItemtemp();
        $Heroes->setItem1($itemmoved);
        $Heroes->setItemtemp($item);
        $weight=$Heroes->getWeight();
        $item1=$Heroes->getItem1();
        $item1_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item1);
        $item2=$Heroes->getItem2();
        $item2_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item2);
        $item3=$Heroes->getItem3();
        $item3_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item3);
        $itemtemp = $Heroes->getItemtemp();
        $itemtemp_item = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($itemtemp);
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        
        return $this->render('equipment_show.html.twig', array('nick'=>$nick,
            'weight'=>$weight, 'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 
            'item1_item'=>$item1_item, 'item2_item'=>$item2_item, 'item3_item'=>$item3_item, 
            'itemtemp'=>$itemtemp, 'itemtemp_item'=>$itemtemp_item));
    }
    
    /**
     * @Route("/insert_item2",name="url_insert_item2")
     * 
     */
    public function insertitem2Action($nick) {
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($Heroes === NULL){
            //nie ma takiego gracza
            return $this->render('loginerror.html.twig', array());
        }
        $itemmoved = $Heroes->getItemtemp();
        $Heroes->setItem2($itemmoved);
        $Heroes->setItemtemp(NULL);
        $weight=$Heroes->getWeight();
        $item1=$Heroes->getItem1();
        $item1_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item1);
        $item2=$Heroes->getItem2();
        $item2_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item2);
        $item3=$Heroes->getItem3();
        $item3_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item3);
        $itemtemp = $Heroes->getItemtemp();
        $itemtemp_item = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($itemtemp);
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        
        return $this->render('equipment_show.html.twig', array('nick'=>$nick,
            'weight'=>$weight, 'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 
            'item1_item'=>$item1_item, 'item2_item'=>$item2_item, 'item3_item'=>$item3_item, 
            'itemtemp'=>$itemtemp, 'itemtemp_item'=>$itemtemp_item));
    }
    
    /**
     * @Route("/insert_item3",name="url_insert_item3")
     * 
     */
    public function insertitem3Action($nick) {
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($Heroes === NULL){
            //nie ma takiego gracza
            return $this->render('loginerror.html.twig', array());
        }
        $itemmoved = $Heroes->getItemtemp();
        $Heroes->setItem3($itemmoved);
        $Heroes->setItemtemp(NULL);
        $weight=$Heroes->getWeight();
        $item1=$Heroes->getItem1();
        $item1_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item1);
        $item2=$Heroes->getItem2();
        $item2_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item2);
        $item3=$Heroes->getItem3();
        $item3_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item3);
        $itemtemp = $Heroes->getItemtemp();
        $itemtemp_item = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($itemtemp);
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        
        return $this->render('equipment_show.html.twig', array('nick'=>$nick,
            'weight'=>$weight, 'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 
            'item1_item'=>$item1_item, 'item2_item'=>$item2_item, 'item3_item'=>$item3_item, 
            'itemtemp'=>$itemtemp, 'itemtemp_item'=>$itemtemp_item));
    }
}

