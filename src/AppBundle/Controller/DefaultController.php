<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Color;
use AppBundle\Entity\CarRange;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
       
        return $this->render('AppBundle::index.html.twig');
    }

    /**
     * Creates a new color ou carRange entity.
     *
     * @Route("/newoption", name="option_new")
     * @Method({"POST","GET"})
     */
    public function newOptionAction(Request $request)
    {
        $color = new Color();
        $formColor = $this->createForm('AppBundle\Form\ColorType', $color);
        $formColor->handleRequest($request);

        if ($formColor->isSubmitted() && $formColor->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($color);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }


        $carRange = new CarRange();
        $formCarRange = $this->createForm('AppBundle\Form\CarRangeType', $carRange);
        $formCarRange->handleRequest($request);

        if ($formCarRange->isSubmitted() && $formCarRange->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carRange);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('AppBundle::others/newOption.html.twig', array(
            'color' => $color,
            'formColor' => $formColor->createView(),
            'formCarRange' => $formCarRange->createView()
        ));
    }
}
