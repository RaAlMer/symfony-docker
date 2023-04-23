<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findAll()
    {
        return $this->createQueryBuilder('u')
            ->orderBy('u.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findById($id)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function advancedSearch($filters)
    {
        $qb = $this->createQueryBuilder('u');

        // Loop through each filter
        foreach ($filters as $field => $filter) {
            if (!empty($filter['value'])) {
                switch ($filter['operator']) {
                    case 'eq':
                        $qb->andWhere("u.{$field} = :{$field}")
                            ->setParameter($field, $filter['value']);
                        break;
                    case 'neq':
                        $qb->andWhere("u.{$field} <> :{$field}")
                            ->setParameter($field, $filter['value']);
                        break;
                    case 'gt':
                        $qb->andWhere("u.{$field} > :{$field}")
                            ->setParameter($field, $filter['value']);
                        break;
                    case 'lt':
                        $qb->andWhere("u.{$field} < :{$field}")
                            ->setParameter($field, $filter['value']);
                        break;
                    case 'range':
                        $qb->andWhere("u.{$field} >= :{$field}_start")
                            ->andWhere("u.{$field} <= :{$field}_end")
                            ->setParameter("{$field}_start", $filter['value']['start'])
                            ->setParameter("{$field}_end", $filter['value']['end']);
                        break;
                    default:
                        // Do nothing
                        break;
                }
            }
        }

        return $qb->getQuery()->getResult();
    }
}