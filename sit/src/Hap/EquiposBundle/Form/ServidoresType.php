<?php

namespace Hap\EquiposBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServidoresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ip',null,array('label' => 'Ip del Servidor'))
            ->add('descripcion',null,array('label' => 'Descripción'))
            ->add('so',null,array('label' => 'Sistema Operativo','multiple' => false))
            ->add('virtualizacion','choice', array('label' => 'Virtualizado, si o no?','choices'  => array('s' => 'Si', 'n' => 'No')))
            ->add('memoria',null,array('label' => 'Memoria'))
            ->add('disco',null,array('label' => 'Tamaño de Disco'))
            ->add('cpu',null,array('label' => 'Número de CPU'))
            ->add('servicios',null,array('label' => 'Tipo de Servicio: ','multiple' => true))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hap\EquiposBundle\Entity\Servidores'
        ));
    }

    public function getName()
    {
        return 'hap_equiposbundle_servidores';
    }
}
