<?php


namespace Clean\Api\Infra\Db\Repositories;


use Clean\Api\App\Contracts\Db\LoadCustomerByEmail;
use Clean\Api\App\Dto\CustomerDTO;
use Clean\Api\Domain\ValueObjects\Email;
use Clean\Api\Infra\Db\Doctrine\Entities\CustomerEntity;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\QueryBuilder;
use Exception;

class CustomerRepository implements LoadCustomerByEmail
{
    private QueryBuilder $queryBuilder;

    public function __construct(EntityManager $entityManager)
    {
        $this->queryBuilder = $entityManager->createQueryBuilder();
    }

    /**
     * @throws Exception
     */
    public function loadCustomerByEmail(Email $email): ?CustomerDTO
    {
        try {
        $query = $this->queryBuilder->select([
            'c.email',
            'c.name',
            'c.password',
            'c.cpf'
        ])->from(CustomerEntity::class,
            'c')->where('c.email = :email')->setParameter('email', $email)
            ->getQuery();
            $customer = $query->getSingleResult();
        } catch (NoResultException | NonUniqueResultException $e) {
            throw new Exception($e->getMessage(), 404);
        }
    }
}
