<?php

namespace My\GraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\GraBundle\Entity\Items2;
use My\GraBundle\Entity\Heroes2;
use My\GraBundle\Entity\Monsters;
use Symfony\Component\HttpFoundation\Request;
use My\GraBundle\Form\Type\ItemType;


    /**
     * @Route("/game/play/{nick}/shop")
     * 
     */
class ShopController extends Controller 
{
    /**
     * @Route("/show",name="url_shop_show")
     * 
     */
    public function showAction($nick)
    {
        $items=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findAll();
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        $current_gold = $Heroes->getGold();
        return $this->render('shop_show.html.twig', array('items'=>$items,
            'current_gold'=>$current_gold));
    }
    
    /**
     * @Route("/buy/{item_name}",name="url_shop_buy")
     * 
     */
    public function buyAction($nick, $item_name)
    {
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        $current_gold = $Heroes->getGold();
        $item1=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item_name);
        $price = $item1->getPrice();
        if($current_gold >= $price){
            $current_gold -= $price;
            $Heroes->setGold($current_gold);
            $Heroes->setItemtemp($item1);
            $dm = $this->getDoctrine()->getManager();
            $dm->persist($Heroes);
            $dm->flush();
        
            return $this->render('shop_buy.html.twig');
        }else{
            return $this->render('shop_buy_error.html.twig');
        }
    }
        
     /**
     * @Route("/sell",name="url_shop_sell")
     * 
     */
    public function sellAction($nick)
    {  
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        $weight = $Heroes->getWeight();
        $itemallitem[0] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem1());
        $itemallitem[1] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem2());
        $itemallitem[2] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem3());
        $item_ground = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItemtemp());
        
        return $this->render('shop_sell.html.twig', array('nick'=>$nick,
            'weight'=>$weight, 'itemallitem'=>$itemallitem, 'item_ground'=>$item_ground ));
    }
    
    /**
     * @Route("/sell//{item_name}",name="url_shop_sell_item1")
     * 
     */
    public function sellitem1Action($nick, $item_name)
    {  
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($Heroes === NULL){
            //nie ma takiego gracza
            return $this->render('loginerror.html.twig', array());
        }
        $item_ground = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItemtemp());
        //$items_weight = $this->get('heroes.helper')->calculate_items_weight($Heroes);
        $item_selled = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item_name);
        $gold_earned = $item_selled->getPrice()/2;
        $current_gold = $Heroes->getGold();
        $current_gold += $gold_earned;
        $Heroes->setGold($current_gold);
        if($Heroes->getitem1() === $item_name){
            $Heroes->setItem1('Empty');
        }else if($Heroes->getitem2() === $item_name){
            $Heroes->setItem2('Empty');
        }else if($Heroes->getitem3() === $item_name){
            $Heroes->setItem3('Empty');
        }else if($Heroes->getItemtemp() === $item_name){
            $Heroes->setItemtemp('Empty');
        }
        
        $weight=$Heroes->getWeight();
        
        $itemallitem[0] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem1());
        $itemallitem[1] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem2());
        $itemallitem[2] = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($Heroes->getItem3());
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        
        return $this->render('shop_sell.html.twig', array('nick'=>$nick,
            'weight'=>$weight, 'itemallitem'=>$itemallitem, 'item_ground'=>$item_ground ));
    }
    
    /**
     * @Route("/sell/item2",name="url_shop_sell_item2")
     * 
     */
    public function sellitem2Action($nick)
    {  
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        $item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneById('1'); 
        $weight=$Heroes->getWeight();
        $item1=$Heroes->getItem1();
        $item1_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item1);
        $item2=$Heroes->getItem2();
        $item2_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item2);
        $gold_earned = $item2_item->getPrice()/2;
        $current_gold = $Heroes->getGold();
        $current_gold += $gold_earned;
        $Heroes->setGold($current_gold);
        $item3=$Heroes->getItem3();
        $item3_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item3);
        $itemtemp = $Heroes->getItemtemp();
        $itemtemp_item = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($itemtemp);
        $Heroes->setItem2($item);
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        
        return $this->render('equipment_show.html.twig', array('nick'=>$nick,
            'weight'=>$weight, 'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 
            'item1_item'=>$item1_item, 'item2_item'=>$item2_item, 'item3_item'=>$item3_item, 
            'itemtemp'=>$itemtemp, 'itemtemp_item'=>$itemtemp_item));
    }
    
    /**
     * @Route("/sell/item3",name="url_shop_sell_item3")
     * 
     */
    public function sellitem3Action($nick)
    {  
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        $item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneById('1'); 
        $weight=$Heroes->getWeight();
        $item1=$Heroes->getItem1();
        $item1_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item1);
        $item2=$Heroes->getItem2();
        $item2_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item2);
        $item3=$Heroes->getItem3();
        $item3_item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($item3);
        $gold_earned = $item3_item->getPrice()/2;
        $current_gold = $Heroes->getGold();
        $current_gold += $gold_earned;
        $Heroes->setGold($current_gold);
        $itemtemp = $Heroes->getItemtemp();
        $itemtemp_item = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneByName($itemtemp);
        $Heroes->setItem2($item);
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        
        return $this->render('equipment_show.html.twig', array('nick'=>$nick,
            'weight'=>$weight, 'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 
            'item1_item'=>$item1_item, 'item2_item'=>$item2_item, 'item3_item'=>$item3_item, 
            'itemtemp'=>$itemtemp, 'itemtemp_item'=>$itemtemp_item));
    }
    
}

