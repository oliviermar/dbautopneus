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
        $brands = $em->getRepository(Brand::class)->findAll();

        return $this->render(
            'reprogramming/index.html.twig',
            ['brands' => $brands]
        );
    }

    /**
     * @Route("/brand/{id}/model", name="reprogramming_model")
     * @ParamConverter("brand", class="App:Brand")
     */
    public function modelAction(EntityManagerInterface $em, Brand $brand)
    {
        $models = $em->getRepository(CarModel::class)->findBy(
            [
                'brand' => $brand->getId()
            ]
        );

        return $this->render(
            'reprogramming/list_model.html.twig',
            ['models' => $models, 'brand' => $brand]
        );
    }

    /**
     * @Route("/model/{id}/year-construct", name="reprogramming_year_construct")
     * @ParamConverter("model", class="App:CarModel")
     */
    public function yearConstructAction(EntityManagerInterface $em, CarModel $model)
    {
        $yearsConstruct = $em->getRepository(YearConstruct::class)->findBy(
            [
                'model' => $model->getId()
            ]
        );

        return $this->render(
            'reprogramming/list_year_construct.html.twig',
            ['yearsConstruct' => $yearsConstruct, 'model' => $model]
        );
    }

    /**
     * @Route("/year-construct/{id}/engine", name="reprogramming_engine")
     * @ParamConverter("yearConstruct", class="App:YearConstruct")
     */
    public function engineAction(EntityManagerInterface $em, YearConstruct $yearConstruct)
    {
        $engines = $em->getRepository(Engine::class)->findBy(
            [
                'yearConstruct' => $yearConstruct->getId()
            ]
        );

        return $this->render(
            'reprogramming/list_engine.html.twig',
            ['engines' => $engines, 'yearConstruct' => $yearConstruct]
        );
    }

    /**
     * @Route("/options/{fuel}", name="option_by_fueloption_by_fuel")
     */
    public function getOptionsAction(EntityManagerInterface $em, $fuel)
    {
        $options = $em->getRepository(Option::class)->getByFuel($fuel);

        return $this->render(
            'reprogramming/list_options.html.twig',
            ['options' => $options]
        );
    }

    /**
     * @Route("/engine/{id}/price", name="reprogramming_price")
     * @ParamConverter("engine", class="App:Engine")
     */
    public function priceAction(EntityManagerInterface $em, Engine $engine)
    {
        return $this->render(
            'reprogramming/engine.html.twig',
            ['engine' => $engine]
        );
    }
}
