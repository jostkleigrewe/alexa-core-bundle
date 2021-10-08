<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Repository;

use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaSessionValue;
use Jostkleigrewe\AlexaCoreBundle\Entity\AlexaUserValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class AlexaUserValueRepository
 *
 * @method AlexaUserValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlexaUserValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlexaUserValue[]    findAll()
 * @method AlexaUserValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Repository
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2020 Sven Jostkleigrewe
 */
class AlexaUserValueRepository extends ServiceEntityRepository
{

    /**
     * AlexaUserRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlexaUserValue::class);
    }

}
