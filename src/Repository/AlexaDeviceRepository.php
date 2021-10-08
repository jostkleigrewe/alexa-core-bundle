<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Repository;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaDevice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class AlexaDeviceRepository
 *
 * @method AlexaDevice|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlexaDevice|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlexaDevice[]    findAll()
 * @method AlexaDevice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @package   Jostkleigrewe\AlexaCoreBundle\Repository
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class AlexaDeviceRepository extends ServiceEntityRepository
{

    /**
     * AlexaDeviceRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlexaDevice::class);
    }

    /**
     * Find a device by device-id
     *
     * @param $deviceId
     * @return AlexaDevice|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByDeviceId($deviceId): ?AlexaDevice
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.deviceId = :deviceId')
            ->setParameter('deviceId', $deviceId)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
