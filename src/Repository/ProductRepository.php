<?php

namespace App\Repository;

use App\Entity\Product;
use App\Model\SearchProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }
    public function findSearch(SearchProduct $searchData)
    {
        $query = $this->createQueryBuilder('p')
            ->innerJoin('p.category', 'c');
        if (!empty($searchData->categories)) {
            $query->andWhere('c IN (:categories)')
                ->setParameter('categories', $searchData->categories);
        }
        return $query->getQuery()->getResult();
    }
}
