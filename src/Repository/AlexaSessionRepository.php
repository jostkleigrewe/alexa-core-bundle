<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Repository;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class AlexaSessionRepository
 *
 * @method AlexaSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlexaSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlexaSession[]    findAll()
 * @method AlexaSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Repository
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License <https://opensource.org/licenses/MIT>
 */
class AlexaSessionRepository extends ServiceEntityRepository
{
    /**
     * AlexaUserRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlexaSession::class);
    }

    /**
     * @param string $value
     * @return AlexaSession|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneBySessionId(string $sessionId): ?AlexaSession
    {
        return $this->createQueryBuilder('s')
//            ->leftJoin('s.alexaUser', 'u')->addSelect('u')
//            ->leftJoin('s.alexaDevice', 'd')->addSelect('d')
//            ->leftJoin('s.sessionValues', 'v')->addSelect('v')
            ->where('s.sessionId = :sid')
            ->setParameter('sid', $sessionId)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
