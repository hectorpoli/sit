<?php

namespace Hap\EquiposBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BitacoraCentroDatosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaIngreso','collot_datetime',array(
                'pickerOptions' => array('format' => 'dd/mm/yyyy',
                    //'startDate' => date('d/m/Y'),
                    'daysOfWeekDisabled' => '0,6',
                    'language' => 'es',
                    'autoclose' => 'true',
                    'minView' => 2),
                'label' => 'Fecha de Ingreso','attr' => array('style' => 'margin-top:10px;')))
            ->add('motivoIngreso',null,array('label' => 'Motivo de Ingreso','attr'=> array('style'=>'width:500px;height:100px;margin-top:10px;')))
            ->add('laboresRealizadas',null,array('label' => 'Labores Realizadas','attr'=> array('style'=>'width:500px;height:100px;margin-top:10px;')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hap\EquiposBundle\Entity\BitacoraCentroDatos'
        ));
    }

    public function getName()
    {
        return 'hap_equiposbundle_bitacoracentrodatos';
    }
}
