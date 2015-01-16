<?php

namespace Shop\SklepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Shop\SklepBundle\Entity\Ask;
use Shop\SklepBundle\Form\AskType;

class PageController extends Controller
{
    public function askAction()
    {


    	// create a task and give it some dummy data for this example
        $ask = new Ask();


        $form = $this->createFormBuilder($ask)
            ->add('name', 'text')
            ->add('email', 'email')
             ->add('content', 'text')

            ->getForm();

        return $this->render('ShopSklepBundle:Page:ask.html.twig', array(
            'form' => $form->createView(),
        ));
    

 


    }
}



