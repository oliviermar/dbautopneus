<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\MecanicFolio;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * class MecanicController
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 */
class MecanicController extends Controller
{
    /**
     * @Route("/mecanic", name="mecanic_index")
     */
    public function indexAction(EntityManagerInterface $em)
    {
        return $this->render(
            'mecanic/index.html.twig', [
                'mecanics_folio' => $em->getRepository(MecanicFolio::class)->getLastWithLimit(3)
            ]
        );
    }

    /**
     * @Route("/mecanic/portfolio", name="mecanic_folio")
     */
    public function portfolioAction(Request $request, EntityManagerInterface $em)
    {
        $qb = $em->getRepository(MecanicFolio::class)->getQueryAll();
        $adapter = new DoctrineORMAdapter($qb);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage(1);
        $pagerfanta->setCurrentPage($request->get('page', 1));

        return $this->render('mecanic/portfolio.html.twig', [
            'pager' => $pagerfanta
        ]);
    }
}
