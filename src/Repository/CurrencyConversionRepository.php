<?php

namespace App\Repository;

use App\Entity\Conversion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CurrencyConversionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conversion::class);
    }

    public function save(Conversion $conversion, bool $useFs = true): void
    {
        if( $useFs == false ){
            $entityManager = $this->getEntityManager();
            $entityManager->persist($conversion);
            $entityManager->flush();
        }else{
            //..
        }
    }
}