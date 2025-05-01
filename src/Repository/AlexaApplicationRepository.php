<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Repository;

use Doctrine\ORM\NonUniqueResultException;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaApplication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class AlexaDeviceRepository
 *
 * @method AlexaApplication|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlexaApplication|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlexaApplication[]    findAll()
 * @method AlexaApplication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Repository
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License <https://opensource.org/licenses/MIT>
 */
class AlexaApplicationRepository extends ServiceEntityRepository
{
    /**
     * AlexaDeviceRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlexaApplication::class);
    }

    /**
     * Find a device by device-id
     *
     * @param string $applicationId
     * @return AlexaApplication|null
     * @throws NonUniqueResultException
     */
    public function findOneByApplicationId(string $applicationId): ?AlexaApplication
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.applicationId = :applicationId')
            ->setParameter('applicationId', $applicationId)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
