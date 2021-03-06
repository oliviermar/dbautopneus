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
                'mecanics_folio' => $em->getRepository(MecanicFolio::class)->findAll()
            ]
        );
    }
}
