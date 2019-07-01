<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="Foo", repositoryClass="AppBundle\Document\Repository\FooDocumentRepository")
 */
class FooDocument
{
    /**
     * @MongoDB\Id
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }
}
