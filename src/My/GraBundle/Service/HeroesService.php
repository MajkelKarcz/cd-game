<?php

namespace My\GraBundle\Service;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class HeroesService{
    
    protected  $container;
    
    public function setContainer($container) {
        $this->container = $container;
    }
    
    public function moja($param='cos tam') {
        //$mik = $this->container->get('doctrine')->getManager()->getRepisitory('MyGrabundle:Heroes2')->findOneByName('mik');
        echo $param;
        die;
    }
    
    public function  calculate_stamina($heroes)
    {
        //$heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        $heroesstamina = $heroes->getStamina();
        if($heroesstamina < 100){
            $now = new \DateTime();
            $heroestime = $heroes->getTimestamp();
            $difference = $now->diff($heroestime)->s;
            $heroesstamina += $difference;
            if($heroesstamina > 100){
                $heroesstamina = 100;
            }
            $heroes->setStamina($heroesstamina);
            $heroes->setTimestamp($now);
            $dm = $this->container->get('doctrine')->getManager();
            $dm->persist($heroes);
            $dm->flush();
        }
    }
    
    public function calculate_item_strbonus($Heroes) {
        $item1 = $Heroes->getItem1();
        $item2 = $Heroes->getItem2();
        $item3 = $Heroes->getItem3();
        $item1_item = $this->container->get('doctrine')->getRepository('MyGraBundle:Items2')->findOneByName($item1);
        $item2_item = $this->container->get('doctrine')->getRepository('MyGraBundle:Items2')->findOneByName($item2);
        $item3_item = $this->container->get('doctrine')->getRepository('MyGraBundle:Items2')->findOneByName($item3);
        $item_str_bonus = $item1_item->getStrBonus() + $item2_item->getStrBonus() + $item3_item->getStrBonus();
        
        return $item_str_bonus;
    }
    
    public function calculate_items_weight($Heroes) {
        $item1 = $Heroes->getItem1();
        $item2 = $Heroes->getItem2();
        $item3 = $Heroes->getItem3();
        $item1_item = $this->container->get('doctrine')->getRepository('MyGraBundle:Items2')->findOneByName($item1);
        $item2_item = $this->container->get('doctrine')->getRepository('MyGraBundle:Items2')->findOneByName($item2);
        $item3_item = $this->container->get('doctrine')->getRepository('MyGraBundle:Items2')->findOneByName($item3);
        $items_weight =  $item1_item->getWeight() + $item2_item->getWeight() + $item3_item->getWeight();
        
        return $items_weight;
    }
}
