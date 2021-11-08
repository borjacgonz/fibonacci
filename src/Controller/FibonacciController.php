<?php
namespace App\Controller;

use App\Service\FibonacciService;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class FibonacciController extends AbstractController
{

    #[Route("/api/fibonacci")]
    public function fibonacci(Request $request, FibonacciService $fibonacciService)
    {
        if (empty($request->get('start')) || empty($request->get('end'))) {
            throw new BadRequestHttpException('Start and end date would be provided.');
        }
        try {
            $start = Carbon::parse($request->get('start'), 'UTC')->getTimestamp();
            $end = Carbon::parse($request->get('end'), 'UTC')->getTimestamp();
        } catch (InvalidFormatException $exception) {
            throw new BadRequestHttpException('Incorrect date format! Valid format: Y-m-d H:i:s');
        }

        $result = $fibonacciService->calculateBetween($start, $end);

        return $this->json($result);
    }
}