<?php
/**
 * Created by PhpStorm.
 * User: albert.juhe
 * Date: 03/10/2018
 * Time: 08:03
 */

namespace App\Infrastructure\TravelBundle\Form;

use App\Domain\Travel\Model\Travel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateTravelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class)
            ->add('startAt',DateType::class)
            ->add('endAt', DateType::class)
            ->add('description',TextareaType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Travel::class,
        ));
    }
}