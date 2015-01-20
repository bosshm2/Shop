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

        $message = \Swift_Message::newInstance()
            ->setSubject('Contact enquiry from symblog')
            ->setFrom('enquiries@symblog.co.uk')
            ->setTo('email@email.com')
            ->setBody($this->renderView('ShopSklepBundle:Page:contactEmail.txt.twig', array('ask' => $ask)));
        $this->get('mailer')->send($message);

        $this->get('session')->setFlash('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');

  
        }
    

 
              return $this->render('ShopSklepBundle:Page:ask.html.twig', array(
            'form' => $form->createView(),
        ));

    }



    public function addAction()
    {

                // create a task and give it some dummy data for this example
        $add = new Item();
     

        $form = $this->createFormBuilder($add)
            ->add('name')
            ->add('price', 'money')
            ->add('description')
            ->add('imageName', 'file') 
            ->add('save', 'submit')
            ->getForm();


    

    $em = $this->getDoctrine()->getManager();
    $em->persist($add);
    $em->flush();


        return $this->render('ShopSklepBundle:Page:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    
}



