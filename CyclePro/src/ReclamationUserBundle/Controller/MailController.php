<?php


namespace ReclamationUserBundle\Controller;



use ReclamationUserBundle\Entity\Mail;
use ReclamationUserBundle\Form\MailType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MailController extends Controller

{
    public function SendMailAction ( Request $request)

    { $mail = new Mail() ;
      $form = $this -> createForm(MailType::class , $mail);
      $form -> handleRequest($request);
      if ($form -> isSubmitted() && $form ->isValid()) {
          $subject = $mail->getSubject();
          $mail = $mail->getMail();
          $objet = $request->get('objet');
          $username = 'wiem.saddem@esprit.tn';
          $message = \Swift_Message::newInstance()
              ->setSubject($subject)
              ->setFrom($username)
              ->setTo($mail)
              ->setBody('Bonjour' );
          $this->get('mailer')->send($message);
          $this->get('session')->getFlashBag()->add('notice', 'Message envoyé avec succés');
      }
      return $this -> render ('@ReclamationUser/Mail/Mail.html.twig', array(
            'f'=> $form->createView()));


      }









}