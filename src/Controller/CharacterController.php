<?php

namespace App\Controller;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Request;

class CharacterController extends AbstractController
{
    /**
     * 
     * Cette méthode permet de récupérer la liste des capsuliers de la base de données
     * 
     * @OA\Tag(name="Character")
     * @Security(name="Bearer")
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
     * 
     * Cette méthode permet de récupérer un capsulier de la base de données
     * 
     * @OA\Tag(name="Character")
     * @Security(name="Bearer")
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

    /**
     * 
     * Cette méthode permet d'enregistrer un capsulier dans la base de données
     * 
     * @OA\Response(
     *     response=200,
     *     description="Retourne la liste des livres",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Character::class, groups={"getShips"}))
     *     )
     * )
     * @OA\Parameter(
     *     name="eveId",
     *     in="query",
     *     description="L'id EVE ONLINE du capsulier'",
     *     @OA\Schema(type="int")
     * )
     * 
     * @OA\Parameter(
     *     name="name",
     *     in="query",
     *     description="Le nom du capsulier'",
     *     @OA\Schema(type="string")
     * )
     * 
     * @OA\Tag(name="Character")
     * @Security(name="Bearer")
     * 
     * @param CharacterRepository $characterRepository
     * @param SerializerInterface $serializer
     * @param Request $request
     * @return JsonResponse
     */
    #[Route('/api/characters', name: 'create_character', methods:['POST'])]
    public function createCharacters(
        SerializerInterface $serializer,
        Request $request,
        EntityManagerInterface $em
    ): JsonResponse
    {

        $character = $serializer-> deserialize($request->getContent(), Character::class, 'json');

        $em->persist($character);
        $em->flush();

        $json = $serializer->serialize($character, 'json', ['groups' => 'getShips']);

        return new JsonResponse(
            $json,
            JsonResponse::HTTP_OK,
            [],
            true
        );
    }
}
