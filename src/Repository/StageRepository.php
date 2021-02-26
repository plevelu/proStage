<?php

namespace App\Repository;

use App\Entity\Stage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Stage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stage[]    findAll()
 * @method Stage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stage::class);
    }

    /**
     * @return Stage[] Returns an array of Stage objects
     */
    public function fetchNomEntrepriseQueryBuilder($entreprise)
    {
      return $this->createQueryBuilder('s')
          ->join('s.entreprise', 'e')
          ->andWhere('e.nom = :entreprise')
          ->setParameter('entreprise', $entreprise)
          ->getQuery()
          ->getResult()
        ;
    }

    /**
     * @return Stage[] Returns an array of Stage objects
     */
    public function fetchNomFormationDQL($formation)
    {
        $entityManager = $this->getEntityManager();
        $requete = $entityManager->createQuery('SELECT s FROM App\Entity\Stage s JOIN s.formations f WHERE f.nom = :nom');
        $requete = $requete->setParameter('nom',$formation);
        return $requete = $requete->execute();
    }


    /*
    public function findOneBySomeField($value): ?Stage
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
