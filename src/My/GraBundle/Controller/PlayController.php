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
     * @Route("/game/play/{nick}")
     * 
     */
class PlayController extends Controller {
    
    /**
     * @Route("/new",name="url_new")
     * 
     */
    public function newAction($nick)
    {   
        $item=$this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneById('1'); 
        //$Player = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        //if($Player === NULL){
            //nie ma takiego gracza
          //  return $this->render('loginerror.html.twig', array());
        //}
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($Heroes != NULL){
        $Heroes->setName($nick);    
        $Heroes->setExp('0');
        $Heroes->setHp('100');
        $Heroes->setStamina('100');
        $Heroes->setStr('0');
        $Heroes->setGold('0');
        $Heroes->setWeight('0');
        $Heroes->setTimestamp(new \DateTime());
        $Heroes->setItem1($item);
        $Heroes->setItem2($item);
        $Heroes->setItem3($item);
        $Heroes->setItemtemp($item);
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
        }else{
        $Heroes=new Heroes2();
        $Heroes->setName($nick);
        $Heroes->setExp('0');
        $Heroes->setHp('100');
        $Heroes->setStamina('100');
        $Heroes->setStr('0');
        $Heroes->setGold('0');
        $Heroes->setWeight('0');
        $Heroes->setTimestamp(new \DateTime());
        $Heroes->setItem1($item);
        $Heroes->setItem2($item);
        $Heroes->setItem3($item);
        $Heroes->setItemtemp($item);
        $dm = $this->getDoctrine()->getManager();
        $dm->persist($Heroes);
        $dm->flush();
    }
        return $this->render('new.html.twig', array());
    }
    /**
     * @Route("/statistic",name="url_statistic")
     * 
     */
    public function statisticAction($nick)
    {   
        //$this->get('heroes.helper')->moja();
        //echo 'za daleko';
        //die;
        $Heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($Heroes === NULL){
            //nie ma takiego gracza
            return $this->render('loginerror.html.twig', array());
        }
        $exp=$Heroes->getExp();
        $hp=$Heroes->getHp();   
        $this->get('heroes.helper')->calculate_stamina($Heroes);
        $stam=$Heroes->getStamina();
        $str=$Heroes->getStr();
        $item_strbonus = $this->get('heroes.helper')->calculate_item_strbonus($Heroes);
        $str += $item_strbonus;
        $gold = $Heroes->getGold();
        
        return $this->render('statistic.html.twig', array('nick'=>$nick, 'exp'=>$exp,
            'hp'=>$hp, 'stam'=>$stam, 'str'=>$str,'gold'=>$gold ));
    }
    
}
