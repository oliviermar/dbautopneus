<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Promotion;
use App\Entity\Contact;
use App\Entity\Rate;
use App\Form\ContactType;
use App\Form\RateType;
use App\Services\Mailer;

/**
 * Class CoreController
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 */
class CoreController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(EntityManagerInterface $em)
    {
        $promotions = $em->getRepository(Promotion::class)->findAll();

        return $this->render(
            'core/index.html.twig',
            ['promotions' => $promotions]
        );
    }

    /**
     * @Route("/price", name="price")
     */
    public function priceAction()
    {
        return $this->render('core/price.html.twig');
    }

    /**
     * @Route("/bio", name="bio")
     */
    public function bioAction()
    {
        return $this->render('core/bio.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, Mailer $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact, [
            'action' => $this->generateUrl('contact'),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->persist($contact);
                $this->getDoctrine()->getManager()->flush();

                $mailer->sendContactMessage($contact);

                return new JsonResponse(['success' => true]);
            } else {
                return new JsonResponse(
                    [
                        'success' => 'false',
                        'form' => $this->get('templating')->render('contact/form.html.twig',
                            [
                                'form' => $form->createView()
                            ]
                        )
                    ]
                );
            }
        }

        return $this->render('contact/form.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/rating", name="rate")
     */
    public function rate(Request $request)
    {
        $rate = new Rate();
        $form = $this->createForm(RateType::class, $rate, [
            'action' => $this->generateUrl('rate'),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->persist($rate);
                $this->getDoctrine()->getManager()->flush();

                return new JsonResponse(['success' => true]);
            } else {
                return new JsonResponse(
                    [
                        'success' => 'false',
                        'form' => $this->get('templating')->render('rateing/form.html.twig',
                            [
                                'form' => $form->createView()
                            ]
                        )
                    ]
                );
            }
        }

        return $this->render('rating/form.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }
}
