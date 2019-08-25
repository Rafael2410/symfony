<?php

namespace App\Controller;

use App\Entity\Person;
use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {

      $em = $this->getDoctrine()->getManager();

      $person  = new Person();

      $randomId  =  random_int ( 1,  4);

      $persons = $em->getRepository('App:Person')->getCarsFromPerson($randomId);

      return $this->render('main/index.html.twig', [
          'controller_name' => 'MainController',
          'person' => $persons,
      ]);
  }
}
