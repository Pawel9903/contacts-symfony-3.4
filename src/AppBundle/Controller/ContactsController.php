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
        $entityManager = $this->getDoctrine()->getManager();
        $contacts = $entityManager->getRepository(Contacts::class)->findAll();

        return $this->render("Contacts/index.html.twig", ['contacts'=>$contacts]);
    }

    public function detailsAction(Contacts $contact)
    {
        return $this->render('Contacts/details.html.twig',['contact'=>$contact]);
    }

    public function addAction(Request $request)
    {
        $contact = new Contacts();
        $form = $this->createForm(ContactType::class, $contact);

        if($request->isMethod('post'))
        {
            $form->handleRequest($request);

            if($form->isValid())
            {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($contact);
                $entityManager->flush();

                $this->addFlash("success", "Contact {$contact->getName()} has been successfully added");

                return $this->redirectToRoute('contacts_details',['id'=>$contact->getId()]);
            }
                $this->addFlash("error","Add Failed");
        }

        return $this->render('MyContacts/add.html.twig',['form'=>$form->createView()]);

    }
}