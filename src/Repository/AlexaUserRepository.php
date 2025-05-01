<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Repository;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AlexaUser>
 *
 * @method AlexaUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlexaUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlexaUser[]    findAll()
 * @method AlexaUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Repository
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License <https://opensource.org/licenses/MIT>
 */
class AlexaUserRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     *
     * @psalm-suppress PossiblyUnusedParam
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlexaUser::class);
    }

    /**
     * Finds one AlexaUser entity by its Alexa ID.
     *
     * @param string $value The Alexa ID to search for.
     *
     * @return AlexaUser|null Returns an AlexaUser entity or null if no matching entity is found.
     */
    public function findOneByAlexaId(string $value): ?AlexaUser
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.alexaId = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
