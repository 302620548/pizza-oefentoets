<?php
namespace App\Controller;

use App\Entity\Category;
use App\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


use App\Repository\KlantRepository;
use App\Repository\PizzaRepository;
use App\Repository\BestelregelRepository;
use App\Repository\BestellingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class pizzaController  extends AbstractController
{
    /**
     * @Route("/home")
     */
    public function home(PizzaRepository $pizzaRepository, KlantRepository $klantRepository, BestellingRepository $bestellingRepository, BestelregelRepository $bestelregelRepository): Response
    {
        $pizza = $pizzaRepository->findAll();
        $klant = $klantRepository->findAll();
        $bestelling = $bestellingRepository->findAll();
        $bestelregel = $bestelregelRepository->findAll();

        return $this->render('pizza/home.html.twig', [
            'pizzas' => $pizza,
            'klanten' => $klant,
            'bestellingen' => $bestelling,
            'bestelregels' => $bestelregel
        ]);
    }

    /**
     * @Route("/form")
     */
    public function form(PizzaRepository $pizzaRepository, KlantRepository $klantRepository, BestellingRepository $bestellingRepository, BestelregelRepository $bestelregelRepository): Response
    {

        $Category = new Category();
        


        $pizza = $pizzaRepository->findAll();
        $klant = $klantRepository->findAll();
        $bestelling = $bestellingRepository->findAll();
        $bestelregel = $bestelregelRepository->findAll();

        return $this->render('pizza/home.html.twig', [
            'pizzas' => $pizza,
            'klanten' => $klant,
            'bestellingen' => $bestelling,
            'bestelregels' => $bestelregel
        ]);
    }
}