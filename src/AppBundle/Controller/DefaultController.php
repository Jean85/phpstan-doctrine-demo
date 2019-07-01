<?php

namespace AppBundle\Controller;

use AppBundle\Document\FooDocument;
use AppBundle\Entity\FooEntity;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var DocumentManager */
    private $documentManager;

    /**
     * DefaultController constructor.
     * @param EntityManagerInterface $entityManager
     * @param DocumentManager $documentManager
     */
    public function __construct(EntityManagerInterface $entityManager, DocumentManager $documentManager)
    {
        $this->entityManager = $entityManager;
        $this->documentManager = $documentManager;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $fooEntity = $this->entityManager->getRepository(FooEntity::class)
            ->findSomething();

        $fooDocument = $this->documentManager->getRepository(FooDocument::class)
            ->findSomethingElse();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }
}
