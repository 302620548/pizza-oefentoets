<?php
namespace App\Controller;

use App\Repository\KlantRepository;
use App\Repository\PizzaRepository;
use App\Repository\BestellingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class pizzaController  extends AbstractController
{
    /**
     * @Route("/home")
     */
    public function home(PizzaRepository $pizzaRepository, KlantRepository $klantRepository, BestellingRepository $bestellingRepository): Response
    {
        $pizza = $pizzaRepository->findAll();
        $klant = $klantRepository->findAll();
        $bestelling = $bestellingRepository->findAll();

        return $this->render('pizza/home.html.twig', [
            'pizzas' => $pizza,
            'klanten' => $klant,
            'bestellingen' => $bestelling
        ]);
    }
}