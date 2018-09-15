<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\Option;

/**
 * class OptionRepository
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 */
class OptionRepository extends EntityRepository
{
    public function getByFuel($fuel)
    {
        $fuels = [Option::ALL_AVAILABLE, $fuel];

        $qb = $this->createQueryBuilder('o');
        $qb
            ->andWhere($qb->expr()->in('o.fuelAvailable', ':fuels'))
            ->setParameter(':fuels', $fuels)
        ;

        return $qb->getQuery()->getResult();
    }
}
