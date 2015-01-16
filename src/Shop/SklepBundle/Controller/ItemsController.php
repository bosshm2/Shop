<?php

namespace Shop\SklepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ItemsController extends Controller
{
    public function itemsAction()
    {
    $em    = $this->get('doctrine.orm.entity_manager');
    $dql   = "SELECT a FROM ShopSklepBundle:Product a";
    $query = $em->createQuery($dql);

    $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
         $this->get('request')->query->get('page', 1),
    20
    );


    return $this->render('ShopSklepBundle:Default:items.html.twig', array('pagination' => $pagination));
	}


}
