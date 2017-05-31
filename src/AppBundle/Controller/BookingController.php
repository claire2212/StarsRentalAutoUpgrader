<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use AppBundle\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use \DateTime;

class BookingController extends Controller
{
   

      /**
     * Creates a new booking entity.
     *
     * @Route("/newBooking", name="booking_new")
     * @Method({"GET", "POST"})
     */
    public function newBookingAction(Request $request, $upgradeBooking=null)
    {
        $booking = new Booking();
        $form = $this->createForm('AppBundle\Form\BookingType', $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //on passe la dispo de la voiture à false lors de la réservation
            $carAvailable = $booking->getCar()->setAvailable(false);
            $em->persist($booking);
            $em->flush();

            return $this->redirectToRoute('booking_all');
        }

        return $this->render('AppBundle::booking/new.html.twig', array(
            'booking' => $booking,
            'form' => $form->createView(),
            'upgradeBooking' => $upgradeBooking
        ));
    }

     /**
     * Lists all Bokkings entities
     *
     * @Route("/bookings", name="booking_all")
     * @Method("GET")
     */
    public function allBbokingsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bookings = $em->getRepository('AppBundle:Booking')->showAllByDate();

        return $this->render('AppBundle::booking/allBookings.html.twig', array(
            'bookings' => $bookings,
        ));
    }

      /**
     * Upgrade XWing
     *
     * @Route("/upgrade/{idClient}", name="upgrade_new")
     * @Method({"GET", "POST"})
     */
    public function upgradeAction()
    {   

        $dataClient= $_POST['$dataClient'];

        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('AppBundle:Client')->find($dataClient);
        $clientLastName = $client->getLastName();
        $clientFirstName = $client->getFirstName();

        $dataCar = $_POST['$dataCar'];

        $em = $this->getDoctrine()->getManager();
        $car = $em->getRepository('AppBundle:Car')->find($dataCar);
       
        $carRange = $car->getCarRange()->getId();

        if ($carRange == '1'){

            $em = $this->getDoctrine()->getManager();

            //on calcule le nombre total de XWing
            $allXWing = $em->getRepository('AppBundle:Car')->findAllXWing();
            $allXWing = count($allXWing);
            //on va chercher le nbre de XWing disponibles
            $xWingAvailable = $em->getRepository('AppBundle:Car')->showXWingAvailable();
            
            //on calcule le pourcentage de XWing disponibles sur l'ensemble du parc XWing
            $availableXWing = ($xWingAvailable/$allXWing)*100;

            if($availableXWing > 15){
                $availableXWing =true;
            }
            else{
                $availableXWing = false;
            }
            

            //on calcule le nombre totalde Tie Fighter
            $allTieFighter = $em->getRepository('AppBundle:Car')->findAllTieFighter();
            $allTieFighter = count($allTieFighter);
            //on va chercher le nbre de TieFighter disponibles
            $allTieFighterAvailable = $em->getRepository('AppBundle:Car')->showTieFighterAvailable();
            
            //on calcule le pourcentage de XWing disponibles sur l'ensemble du parc XWing
            $availableTieFighter = ($xWingAvailable/$allXWing)*100;

            if($availableTieFighter > 50){
                $availableTieFighter = true;
            }
            else{
                $availableTieFighter = false;
            }
            

            //on va chercher les résevration d'un client sur les 30 derniers jours
            $clientBooking = $em->getRepository('AppBundle:Booking')->bookingsPerClientPerMonth($dataClient);
            $clientBooking = count($clientBooking);
            if($clientBooking > 2){
                $clientBooking = true;
            }
            else{
                $clientBooking = false;
            }
            
            // on vérifie que les trois conditions sont respectées
            if($availableXWing && $availableTieFighter && $clientBooking){
                $upgrade = true;
                
                
            }
            else{
                $upgrade = false;
                //echo "Vous ne pouvez pas être surclassé";
                
            }
       
        }
        else{
            $upgrade = false;
            //echo "Il n\'existe pas de gamme supérieure";
            
        } 
        return new JsonResponse([
            "upgrade" =>"$upgrade",
            "lastName"=>"$clientLastName",
            "firstName"=>"$clientFirstName"
        ]); 
    }
}
