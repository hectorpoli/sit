<?php

namespace Hap\EquiposBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SOType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreSo',null,array('label' => 'Nombre Sistema Operativo'))
            ->add('version',null,array('label' => 'Version'))
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hap\EquiposBundle\Entity\SO'
        ));
    }

    public function getName()
    {
        return 'hap_equiposbundle_so';
    }
}
