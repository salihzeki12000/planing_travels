<?php


namespace App\Infrastructure\Application\ElasticSearch\Notification;

use Doctrine\ORM\Event\LifecycleEventArgs;
use App\Infrastructure\Application\ElasticSearch\Repository\ElasticSearchRepository;
use App\Infrastructure\Application\ElasticSearch\Factory\FactoryElasticSearchRepository;

class ElasticSearchListener
{
    /** @var ElasticSearchRepository */
    private $factoryElasticSearchRepository;

    public function __construct(FactoryElasticSearchRepository $factoryElasticSearchRepository)
    {
        $this->factoryElasticSearchRepository = $factoryElasticSearchRepository;
    }


    /**
     * @param LifecycleEventArgs $args
     * @throws \ReflectionException
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        /** @var ElasticSearchRepository $elasticSearchRepository */
        $elasticSearchRepository = $this->factoryElasticSearchRepository->Build((new \ReflectionClass($entity))->getShortName());

        if ($elasticSearchRepository) {
            $elasticSearchRepository->save($entity);
        }
    }
}