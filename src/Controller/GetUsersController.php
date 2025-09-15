<?php 

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class GetUsersController extends AbstractController{
    public function __construct(private UserRepository $userRepository){}

    #[Route('/api/users', name: 'users', methods: ['GET'])]
    public function get(): JsonResponse{
        $result = $this->userRepository->get();

        return $this->json($result);

    }
}