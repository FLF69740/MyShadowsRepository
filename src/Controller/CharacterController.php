<?php

namespace App\Controller;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CharacterController extends AbstractController
{
    #[Route('/api/characters', name: 'app_character', methods:['GET'])]
    public function getCharacters(
        SerializerInterface $serializer,
        CharacterRepository $repository
    ): JsonResponse
    {

        $characters = $repository->findAll();
        $json = $serializer->serialize($characters, 'json');

        return new JsonResponse(
            $json,
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }

    #[Route('/api/characters/{id}', name: 'single_character', methods:['GET'])]
    public function getSingleCharacter(
        SerializerInterface $serializer,
        Character $character
    ): JsonResponse
    {

        $json = $serializer->serialize($character, 'json');
        return new JsonResponse(
            $json,
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }
}
