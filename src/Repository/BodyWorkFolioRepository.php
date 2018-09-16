<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\BodyWorkFolio;

/**
 * class BodyWorkFolioRepository
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 */
class BodyWorkFolioRepository extends EntityRepository
{
    /**
     * @param int $limit
     *
     * @return BodyWorkFolio[]
     */
    public function getLastWithLimit($limit)
    {
        $qb = $this->createQueryBuilder('b');
        $qb
            ->join('b.befores', 'i')
            ->setMaxResults($limit)
            ->orderBy('i.createdAt', 'ASC')
        ;

        return $qb->getQuery()->getResult();
    }

    /**
     * @return QueryBuilder
     */
    public function getQueryAll()
    {
        return $this->createQueryBuilder('b');
    }
}
