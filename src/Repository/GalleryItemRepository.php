<?php

namespace App\Repository;

use App\Entity\GalleryItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GalleryItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method GalleryItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method GalleryItem[]    findAll()
 * @method GalleryItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GalleryItemRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GalleryItem::class);
    }

//    /**
//     * @return GalleryItem[] Returns an array of GalleryItem objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GalleryItem
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
