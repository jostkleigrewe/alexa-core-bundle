<?php
declare(strict_types = 1);

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
 * @copyright 2021 Sven Jostkleigrewe
 */
class AlexaUserRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlexaUser::class);
    }

    public function findOneByAlexaId($value): ?AlexaUser
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.alexaId = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
