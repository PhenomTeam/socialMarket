<?php

namespace Phenom\WafeeeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array('attr' => array('placeholder'=>'User Name'), 'label' => false))
            ->add('email', 'text', array('attr' => array('placeholder'=>'Email'), 'label' => false))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'The password fields must match.',
                'options' => array('attr' => array('class' => 'password-field')),
                'required' => true,
                'first_options'  => array('attr' => array('placeholder' => 'Password'), 'label' => false),
                'second_options' => array('attr' => array('placeholder' => 'Confirm Password'), 'label' => false)))
            ->add('submit', 'submit', ['label'=>'Register'])
            ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Phenom\WafeeeBundle\Entity\User',
            'attr' => array('novalidate'=>'novalidate')
        ));
    }

    public function getName()
    {
        return 'phenom_wafeee_bundle_registration_type';
    }
}
