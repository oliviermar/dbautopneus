<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\BodyWorkFolio;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * Class BodyWorkController
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 */
class BodyWorkController extends Controller
{
    /**
     * @Route("/carrosserie", name="bodywork_index")
     */
    public function indexAction(EntityManagerInterface $em)
    {
        $bodyWorksFolio = $em->getRepository(BodyWorkFolio::class)->getLastWithLimit(3);

        return $this->render('body_work/index.html.twig', ['bodyWorks' => $bodyWorksFolio]);
    }

    /**
     * @Route("/carrosserie/portfolio", name="bodywork_folio")
     */
    public function portfolioAction(Request $request, EntityManagerInterface $em)
    {
        $qb = $em->getRepository(BodyWorkFolio::class)->getQueryAll();
        $adapter = new DoctrineORMAdapter($qb);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage(10);
        $pagerfanta->setCurrentPage($request->get('page', 1));

        return $this->render('body_work/portfolio.html.twig', [
            'pager' => $pagerfanta
        ]);
    }
}
