<?php

namespace App\Repository;

use App\Entity\Conversion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class CurrencyConversionRepository extends ServiceEntityRepository
{
    private $entityManager;

    public function __construct(
        ManagerRegistry $registry, 
        EntityManagerInterface $entityManager
    )
    {
        $this->entityManager = $entityManager;

        parent::__construct($registry, Conversion::class);
    }
    
    /**
     * Saves a Historical data to database.
     *
     * @param Request $request The current Request object.
     * system instead of the EntityManager to persist the object.
     *
     * @return bool Returns true if the Historical data is saved successfully, otherwise false.
     * @throws \Exception If an error occurs while saving the Historical data.
     */
    public function save(Request $request)
    {
        try {
            $conversion = new Conversion();
            $conversionParams = json_decode($request->getContent());
    
            $conversion->setQuantity($conversionParams->quantity);
            $conversion->setSourceCurrency($conversionParams->sourceCurrency);
            $conversion->setTargetCurrency($conversionParams->targetCurrency);
            $conversion->setAmountConverted($conversionParams->amountConverted);
            $conversion->setCreationDate( \DateTime::createFromFormat('Y-m-d', $conversionParams->creationDate));

            $this->entityManager->persist($conversion);
            $this->entityManager->flush();

            return true;
            
        } catch (\Exception $e) {
            throw new \Exception('Error saving the conversion: ' . $e->getMessage());
        }
    }

    /**
     * Obtains a collection of Conversion entities sorted in descending order by ID.
     * 
     * @return Conversion[]
     */
    public function list()
    {
        $conversionCollection = $this->createQueryBuilder('c')
            ->orderBy('c.id', 'DESC')
            ->getQuery()
            ->getResult();

        return $conversionCollection;
    }
    
}