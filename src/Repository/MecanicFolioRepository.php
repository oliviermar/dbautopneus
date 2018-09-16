<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\BodyWorkFolio;

/**
 * Class MecanicFolioRepository
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 */
class MecanicFolioRepository extends EntityRepository
{
    /**
     * @param int $limit
     *
     * @return MecanicFolio[]
     */
    public function getLastWithLimit($limit)
    {
        $qb = $this->createQueryBuilder('m');
        $qb
            ->join('m.images', 'i')
            ->setMaxResults($limit)
            ->orderBy('i.createdAt', 'ASC')
        ;

        return $qb->getQuery()->getResult();
    }
}
