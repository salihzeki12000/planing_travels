<?php


namespace App\Infrastructure\TravelBundle\Repository;


use App\Domain\Travel\Model\Travel;
use App\Domain\Travel\Repository\TravelRepository;
use App\Domain\User\Model\User;
use Elastica\Document;
use FOS\ElasticaBundle\Index\IndexManager;
use FOS\ElasticaBundle\Elastica\Index;
use App\Infrastructure\Application\ElasticSearch\Services\ElasticSearchIndex;
use App\Infrastructure\Application\ElasticSearch\Repository\ElasticSearchRepository;

class ElasticSearchTravelRepository extends ElasticSearchRepository implements TravelRepository
{
    const TRAVEL_INDEX = 'travel';
    const TRAVEL_DOCUMENT_TYPE = 'travel';

    /** @var IndexManager */
    private $indexManager;
    /** @var Index */
    private $index;
    private $typeDocument;

    /**
     * ElasticSearchTravelRepository constructor.
     * @param IndexManager $indexManager
     * @param ElasticSearchIndex $elasticSearchIndex
     */
    public function __construct(
        IndexManager $indexManager,
        ElasticSearchIndex $elasticSearchIndex
    )
    {
        parent::__construct($elasticSearchIndex);
        $this->indexManager = $indexManager;
        $this->index = $this->elasticSearchIndex->getOne(self::TRAVEL_INDEX);
        $this->typeDocument = $this->index->getType(self::TRAVEL_DOCUMENT_TYPE);
    }

    /**
     * Add travel to elascticsearch
     * @param Travel $travel
     * @return mixed|void
     */
    public function save(Travel $travel)
    {
        $travelDocument = new Document($travel->getId(),$travel->toArray());
        $this->typeDocument->addDocument($travelDocument);
        $this->refresh();
    }

    public function refresh()
    {
        $this->typeDocument->getIndex()->refresh();
    }

    public function ofSlugOrFail(string $slug)
    {
        // TODO: Implement ofSlugOrFail() method.
    }

    public function TravelsAllOrderedBy($maximResults)
    {
        // TODO: Implement TravelsAllOrderedBy() method.
    }

    public function getAllTravelsByUser(User $user)
    {
        // TODO: Implement getAllTravelsByUser() method.
    }


    public function getTravelById(int $id): Travel
    {
        // TODO: Implement getTravelById() method.
    }

    public function findBy(array $criteria)
    {
        // TODO: Implement findBy() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

}