<?php

namespace Hap\EquiposBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class PrestamoFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'filter_number_range')
            ->add('fechaSolicitud', 'filter_date_range')
            ->add('fechaPrestamo', 'filter_date_range')
            ->add('fechaDevolucion', 'filter_date_range')
            ->add('fechaRegreso', 'filter_date_range')
            ->add('esInterno', 'filter_choice')
            ->add('cantidad', 'filter_number_range')
            ->add('esAprobado', 'filter_choice')
            ->add('cantidadAprobada', 'filter_number_range')
        ;

        $listener = function(FormEvent $event)
        {
            // Is data empty?
            foreach ($event->getData() as $data) {
                if(is_array($data)) {
                    foreach ($data as $subData) {
                        if(!empty($subData)) return;
                    }
                }
                else {
                    if(!empty($data)) return;
                }
            }

            $event->getForm()->addError(new FormError('Filter empty'));
        };
        $builder->addEventListener(FormEvents::POST_BIND, $listener);
    }

    public function getName()
    {
        return 'hap_equiposbundle_prestamofiltertype';
    }
}
