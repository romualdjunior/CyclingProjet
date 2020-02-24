<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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

        return $this->render('@Commande\shopSingle.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
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
            return $this->render("@Commande/shopSingle.html.twig",array("connexion"=>"true"));
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


}
