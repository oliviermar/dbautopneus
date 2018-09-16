<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\BodyWorkFolio;

/**
 * Class BodyWorkController
 *
 * @author <o.marechal@icloud.com>
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
}
