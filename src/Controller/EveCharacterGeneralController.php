<?php

namespace App\Controller;

use App\Entity\CharacterEve;
use App\Repository\CharacterEveRepository;
use App\Repository\CharacterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class EveCharacterGeneralController extends AbstractController
{
    #[Route('/api/eveCharacterMain/{id}', name: 'eve_app_character', methods:['GET'])]
    public function getCharacters(
        SerializerInterface $serializer,
        CharacterRepository $repository,
        CharacterEveRepository $eveRepository,
        EntityManagerInterface $em,
        HttpClientInterface $httpClient,
        int $id
    ): JsonResponse
    {

        $character = $repository->find($id);

        $response = $httpClient->request( 'GET',
            'https://esi.evetech.net/latest/characters/'. $character->getEveid() .'/?datasource=tranquility'
        );

        $characterEve = $serializer->deserialize($response->getContent(), CharacterEve::class, 'json');

        $character = $eveRepository->mapCharacterEveToCharacter($character, $characterEve);
        $em-> persist($character);
        $em->flush();

        return new JsonResponse( $response->getContent(), 
            $response->getStatusCode(), 
            [],
            true
        );
        
    }
}
