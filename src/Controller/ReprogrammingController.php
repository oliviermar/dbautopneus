<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Entity\CarModel;
use App\Entity\Engine;
use App\Entity\Option;
use App\Entity\YearConstruct;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Class ReprogrammingController
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 * @Route("/reprogramming")
 */
class ReprogrammingController extends Controller
{
    /**
     * @Route("/", name="reprogramming_index")
     */
    public function indexAction(EntityManagerInterface $em)
    {
        return $this->render('reprogramming/index.html.twig');
    }
}
