<?php

namespace Phenom\WafeeeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text',['attr'=>['placeholder'=>'User Name']])
            ->add('firstname','text',['attr'=>['placeholder'=>'First Name']])
            ->add('lastname','text',['attr'=>['placeholder'=>'Last Name']])
            ->add('phone','text',['attr'=>['placeholder'=>'Phone']])
            ->add('email','text',['attr'=>['placeholder'=>'Email']])
            ->add('address','text',['attr'=>['placeholder'=>'Address']])
            ->add('Password', 'repeated', array(
                'first_name'  => 'password',
                'second_name' => 'confirm',
                'type'        => 'password',
            ));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Phenom\WafeeeBundle\Entity\User',
            'csrf_protection' => true,
            'csrf_field_name' => '_csrf_token',
            'intention' => 'authenticate',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'phenom_wafeeebundle_user';
    }
}
