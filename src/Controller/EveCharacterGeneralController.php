<?php

namespace App\Controller;

use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class EveCharacterGeneralController extends AbstractController
{
    #[Route('/api/eveCharacterMain/{id}', name: 'eve_app_character', methods:['GET'])]
    public function getCharacters(
        SerializerInterface $serializer,
        CharacterRepository $repository,
        HttpClientInterface $httpClient,
        int $id
    ): JsonResponse
    {

        $character = $repository->find($id);

        $response = $httpClient->request( 'GET',
            'https://esi.evetech.net/latest/characters/'. $character->getEveid() .'/?datasource=tranquility'
        );

        return new JsonResponse( $response->getContent(), 
            $response->getStatusCode(), 
            [],
            true
        );
    }
}
