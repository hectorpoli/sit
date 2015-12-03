<?php

namespace Hap\EquiposBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrestamoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaSolicitud','collot_datetime',array(
                'pickerOptions' => array('format' => 'dd/mm/yyyy',
                    //'startDate' => date('d/m/Y'),
                    'daysOfWeekDisabled' => '0,6',
                    'language' => 'es',
                    'autoclose' => 'true',
                    'minView' => 2),
                'label' => 'Fecha de Solicitud','attr' => array('style' => 'margin-top:10px;')))
            ->add('fechaPrestamo','collot_datetime',array(
                'pickerOptions' => array('format' => 'dd/mm/yyyy',
                    //'startDate' => date('d/m/Y'),
                    'daysOfWeekDisabled' => '0,6',
                    'language' => 'es',
                    'autoclose' => 'true',
                    'minView' => 2),
                'label' => 'Fecha de Prestamo','attr' => array('style' => 'margin-top:10px;')))
            ->add('fechaDevolucion','collot_datetime',array(
                'pickerOptions' => array('format' => 'dd/mm/yyyy',
                    //'startDate' => date('d/m/Y'),
                    'daysOfWeekDisabled' => '0,6',
                    'language' => 'es',
                    'autoclose' => 'true',
                    'minView' => 2),
                'label' => 'Fecha para Devolución','attr' => array('style' => 'margin-top:10px;')))
            ->add('fechaRegreso','collot_datetime',array(
                'pickerOptions' => array('format' => 'dd/mm/yyyy',
                    //'startDate' => date('d/m/Y'),
                    'daysOfWeekDisabled' => '0,6',
                    'language' => 'es',
                    'autoclose' => 'true',
                    'minView' => 2),
                'label' => 'Fecha real de Devolución','attr' => array('style' => 'margin-top:10px;')))
            ->add('esInterno','checkbox',array('label' => '¿Es una actividad interna?'))
            ->add('cantidad')
            ->add('esAprobado','checkbox',array('label' => '¿Es aprobado el prestamo?'))
            ->add('cantidadAprobada')
            ->add('equipoPrestamo')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hap\EquiposBundle\Entity\Prestamo'
        ));
    }

    public function getName()
    {
        return 'hap_equiposbundle_prestamo';
    }
}
