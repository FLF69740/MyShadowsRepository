<?php

namespace App\Repository;

use App\Entity\Character;
use App\Entity\CharacterEve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CharacterEve>
 *
 * @method CharacterEve|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterEve|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterEve[]    findAll()
 * @method CharacterEve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterEveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterEve::class);
    }

    public function mapCharacterEveToCharacter(Character $character, CharacterEve $characterEve): Character {
        $character->setName($characterEve->getName());
        $character->setAllianceId($characterEve->getAllianceId());
        $character->setBirthday($characterEve->getBirthday());
        $character->setCorporationId($characterEve->getCorporationId());
        $character->setBloddlineId($characterEve->getBloodlineId());
        $character->setGender($characterEve->getGender());
        $character->setRaceId($characterEve->getRaceId());
        $character->setDescription($characterEve->getDescription());
        $character->setSecurityStatus($characterEve->getSecurityStatus());

        return $character;
    } 

    //    /**
    //     * @return CharacterEve[] Returns an array of CharacterEve objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CharacterEve
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
