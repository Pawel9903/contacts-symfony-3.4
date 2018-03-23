<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 23.03.2018
 * Time: 07:52
 */

namespace AppBundle\Form;


use AppBundle\Entity\Contacts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;





class LocalType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'ENG' => 'en',
                    'PL' => 'pl'
                )
            ), ['label' => 'Language']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Contacts::class]);
    }
}