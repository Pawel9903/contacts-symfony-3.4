<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 21.02.2018
 * Time: 10:20
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactsController extends Controller
{
    public function indexAction()
    {
        return $this->render("Contacts/index.html.twig");
    }
}