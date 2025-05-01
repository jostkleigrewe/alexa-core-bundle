<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle\Repository;

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
 * @copyright 2025 Sven Jostkleigrewe
 * @license   MIT License <https://opensource.org/licenses/MIT>
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
