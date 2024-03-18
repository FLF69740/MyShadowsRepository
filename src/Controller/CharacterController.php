<?php

namespace App\Controller;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;

class CharacterController extends AbstractController
{
    /**
     * @OA\Tag(name="Character")
     * 
     * @param CharacterRepository $characterRepository
     * @param SerializerInterface $serializer
     * @param Request $request
     * @return JsonResponse
     */
    #[Route('/api/characters', name: 'app_character', methods:['GET'])]
    public function getCharacters(
        SerializerInterface $serializer,
        CharacterRepository $repository
    ): JsonResponse
    {

        $characters = $repository->findAll();
        $json = $serializer->serialize($characters, 'json', ['groups' => 'getShips']);

        return new JsonResponse(
            $json,
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @OA\Tag(name="Character")
     * 
     * @param CharacterRepository $characterRepository
     * @param SerializerInterface $serializer
     * @param Request $request
     * @return JsonResponse
     */
    #[Route('/api/characters/{id}', name: 'single_character', methods:['GET'])]
    public function getSingleCharacter(
        SerializerInterface $serializer,
        Character $character
    ): JsonResponse
    {

        $json = $serializer->serialize($character, 'json', ['groups' => 'getShips']);
        return new JsonResponse(
            $json,
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }
}
