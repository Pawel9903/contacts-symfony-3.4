<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 21.02.2018
 * Time: 10:20
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Contacts;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactsController extends Controller
{
    public function indexAction(Request $request)
    {
        $locale = $request->getLocale();
        return $this->render("Contacts/index.html.twig",['locale'=>'en']);
    }

    public function contactsAction()
    {
        $this->denyAccessUnlessGranted("ROLE_USER", "You're not logged in!");

        $entityManager = $this->getDoctrine()->getManager();
        $contacts = $entityManager->getRepository(Contacts::class)->findAll();

        return $this->render("Contacts/contacts.html.twig", ['contacts'=>$contacts]);
    }

    public function detailsAction(Contacts $contact)
    {
        $this->denyAccessUnlessGranted("ROLE_USER", "You're not logged in!");

        return $this->render('Contacts/details.html.twig',['contact'=>$contact]);
    }

}