<?php
namespace App\Controller;

use App\Repository\KlantRepository;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class pizzaController  extends AbstractController
{
    /**
     * @Route("/home")
     */
    public function home(PizzaRepository $pizzaRepository, KlantRepository $klantRepository): Response
    {
        $pizza = $pizzaRepository->findAll();
        $klant = $klantRepository->findAll();

        return $this->render('pizza/home.html.twig', [
            'pizzas' => $pizza,
            'klanten' => $klant
        ]);
    }
}