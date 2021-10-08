<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Repository;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaRequestResponseLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class AlexaUserRepository
 *
 * @method AlexaRequestResponseLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlexaRequestResponseLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlexaRequestResponseLog[]    findAll()
 * @method AlexaRequestResponseLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Repository
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
class AlexaRequestResponseLogRepository extends ServiceEntityRepository
{

    /**
     * AlexaRequestResponseLogRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlexaRequestResponseLog::class);
    }

}
