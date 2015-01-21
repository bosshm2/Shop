<?php

namespace Shop\SklepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Shop\SklepBundle\Entity\Ask;
use Shop\SklepBundle\Entity\Item;
use Shop\SklepBundle\Form\AskType;

class PageController extends Controller
{
    public function askAction()
    {

        $ask = new Ask();


        $form = $this->createFormBuilder($ask)
            ->add('name', 'text')
            ->add('email', 'email')
            ->add('content', 'text')
            ->getForm();


        if ($form->isValid()) 
        {

        $mailer = $this->get('mailer');
        $message = $mailer->createMessage()
            ->setSubject('Pytanie o produkt')
            ->setFrom('shop@sklep.pl')
            ->setTo('email@email.com')
            ->setBody($this->renderView('ShopSklepBundle:Page:contactEmail.txt.twig', array('ask' => $ask)));
        $this->get('mailer')->send($message);

  
        }
    

 
              return $this->render('ShopSklepBundle:Page:ask.html.twig', array(
            'form' => $form->createView(),
        ));

    }


    public function loginAction()   {


        return $this->render('ShopSklepBundle:Page:slogin.html.twig');
    }


    
}



