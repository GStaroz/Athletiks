<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace AppBundle\Form;

use AppBundle\Entity\Athlete;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\OptionsResolver\OptionsResolver;
/**
 * Description of InscriptionFormType
 *
 * @author guillaume
 */
class AthleteType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder
                
                ->add('firstname')
                ->add('lastname')
                ->add('birthdate')
                ;
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(['data_class'=> Athlete::class]);
    }
}
