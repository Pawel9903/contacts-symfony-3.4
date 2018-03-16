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
    public function indexAction()
    {
        return $this->render("Contacts/index.html.twig");
    }

    public function contactsAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $contacts = $entityManager->getRepository(Contacts::class)->findAll();

        return $this->render("Contacts/contacts.html.twig", ['contacts'=>$contacts]);
    }

    public function detailsAction(Contacts $contact)
    {
        return $this->render('Contacts/details.html.twig',['contact'=>$contact]);
    }

}