<?php
namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;

class UserRepository extends ServiceEntityRepository 
// implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function get():array{

        $SQL = "SELECT * FROM users";
        $connection = $this->getEntityManager()->getConnection();
        $statement = $connection->prepare($SQL);
        // $statement->bindValue('seriId', $seriId);
        

        $result = $statement->executeQuery();
        return $result->fetchAllAssociative();

    }
}
