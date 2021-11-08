<?php
namespace App\Controller;

use App\Service\FibonacciService;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{

    #[Route("/")]
    public function home(Request $request)
    {
        return $this->render('home.html.twig');
    }
}