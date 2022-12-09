<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $em): Response
    {
        //get all of my Country
        $repository = $em->getRepository(Country::class);
        $countries = $repository->findAll();

        //get all of my categories
        $repository = $em->getRepository(Category::class);
        $categories = $repository->findAll();

        return $this->render('default/index.html.twig', [
            'countries' => $countries,
            'categories' => $categories
        ]);
    }
}
