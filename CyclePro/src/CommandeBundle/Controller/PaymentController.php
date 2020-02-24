<?php

namespace CommandeBundle\Controller;

use CommandeBundle\Entity\Commande;
use CommandeBundle\Form\PaymentType;
use Payum\Core\Request\GetHumanStatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PaymentController extends Controller
{
    public function prepareAction(Request $request)
    {
        $gatewayName = 'paypal_express_checkout';
        $em=$this->getDoctrine()->getManager();
        $storage = $this->get('payum')->getStorage('CommandeBundle\Entity\Payment');
        $session=$request->getSession();
        $payment = $storage->create();
        $form=$this->createForm(PaymentType::class,$payment);
        $form=$form->handleRequest($request);
        if( $form->isValid()) {
            $payment->setNumber(uniqid());
            $payment->setCurrencyCode('EUR');
            $payment->setTotalAmount($session->get("total")); // 1.23 EUR
            $payment->setDescription('Achat des velos');
            $payment->setClientId($this->getUser()->getId());
            $payment->setClientEmail($this->getUser()->getEmail());
            $commande=$em->getRepository(Commande::class)->find($session->get("idCommande"));
            $commande->setEtat("paye");
            $payment->setCommande($commande);
            $storage->update($payment);
            $em->flush();
            $captureToken = $this->get('payum')->getTokenFactory()->createCaptureToken(
                $gatewayName,
                $payment,
                'afficherReceipt' // the route to redirect after capture
            );

            return $this->redirect($captureToken->getTargetUrl());
        }

        return $this->render('@Commande/payment.html.twig', array(
            "form"=>$form->createView()
        ));



    }

    public function doneAction(Request $request)
    {
        $token = $this->get('payum')->getHttpRequestVerifier()->verify($request);

        $gateway = $this->get('payum')->getGateway($token->getGatewayName());

        // You can invalidate the token, so that the URL cannot be requested any more:
        $this->get('payum')->getHttpRequestVerifier()->invalidate($token);

        // Once you have the token, you can get the payment entity from the storage directly.
        // $identity = $token->getDetails();
        // $payment = $this->get('payum')->getStorage($identity->getClass())->find($identity);

        // Or Payum can fetch the entity for you while executing a request (preferred).
        $gateway->execute($status = new GetHumanStatus($token));
        $payment = $status->getFirstModel();

        // Now you have order and payment status
        return new JsonResponse(array(
            'status' => $status->getValue(),
            'payment' => array(
                'total_amount' => $payment->getTotalAmount(),
                'currency_code' => $payment->getCurrencyCode(),
                'details' => $payment->getDetails(),
            ),
        ));
    }
}
