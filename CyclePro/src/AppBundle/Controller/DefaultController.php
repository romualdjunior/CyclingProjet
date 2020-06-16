<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        //juste pour tester le smodifications du projet

        //maintenant je veux travailler rapidement que dire merci

        //moi je veux travailler rapidemnt que dire merci infiniment 

        return $this->redirectToRoute("listeVelo");

    }
    /**
     * @Route("/redirection", name="redirection")
     */
    public function redirectAction(){
        $authChecker=$this->container->get("security.authorization_checker");
        if ($authChecker->isGranted("ROLE_ADMIN"))

        {
            return $this->render("homeAdmin.html.twig",array("connexion"=>"true"));
        }
        else if($authChecker->isGranted("ROLE_USER")){
            return $this->redirectToRoute("listeVelo");
        }
        else {
            return $this->render("@FOSUser/Security/login.html.twig");
        }
    }
    /**
     * @Route("/send-notification", name="send_notification")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */

        public function sendNotification(Request $request)
        {
            $manager = $this->get('mgilet.notification');
            $notif = $manager->createNotification('Hello world !');
            $notif->setMessage('This a notification.');
            $notif->setLink('http://symfony.com/');
            // or the one-line method :
            // $manager->createNotification('Notification subject','Some random text','http://google.fr');

            // you can add a notification to a list of entities
            // the third parameter ``$flush`` allows you to directly flush the entities
            $manager->addNotification(array($this->getUser()), $notif, true);

            return $this->redirectToRoute('homepage');
        }

    /**
     * @Route("/connexionMobile/{username}/{password}", name="connexionMobile")
     */
    public function connexionMobileAction($username,$password){
        $em=$this->getDoctrine();
        $user_in_store=$em->getRepository(User::class)->findUtilisateur($username,$password);
        $encoderService=$this->container->get("security.password_encoder");

        foreach ($user_in_store as $user_in_store){
            if($encoderService->isPasswordValid($user_in_store, $password))
            { $serializer = new Serializer([new ObjectNormalizer()]);
                $formatted = $serializer->normalize($user_in_store);
                return new JsonResponse($formatted);}


        }
        return new JsonResponse("non existant",200);
    }


}
