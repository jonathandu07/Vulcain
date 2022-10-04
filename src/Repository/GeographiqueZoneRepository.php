<?php

namespace App\Repository;

use App\Entity\GeographiqueZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GeographiqueZone>
 *
 * @method GeographiqueZone|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeographiqueZone|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeographiqueZone[]    findAll()
 * @method GeographiqueZone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeographiqueZoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeographiqueZone::class);
    }

    public function add(GeographiqueZone $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(GeographiqueZone $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return GeographiqueZone[] Returns an array of GeographiqueZone objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GeographiqueZone
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
