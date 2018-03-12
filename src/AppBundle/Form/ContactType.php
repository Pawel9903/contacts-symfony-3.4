<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 08.03.2018
 * Time: 11:28
 */

namespace AppBundle\Form;


use AppBundle\Entity\Contacts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,['label'=>'Name*'])
            ->add('surname',TextType::class,['label'=>'Surname*'])
            ->add('email',TextType::class,['label'=>'Email*'])
            ->add('telephone',TelType::class,['label'=>'Telephone*'])
            ->add('address',TextType::class,['label'=>'Address'])
            ->add('note',TextareaType::class,['label'=>'description'])
            ->add('type',ChoiceType::class,array(
                'choices'=>array(
                    'PRIVATE' => 'private',
                    'WORK' => 'work'
                )
            ),['label'=>'Type*'])
            ->add('picture',FileType::class,['label'=>'Picture'])
            ->add('submit',SubmitType::class,['label'=>'Confirm']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class'=>Contacts::class]);
    }
}