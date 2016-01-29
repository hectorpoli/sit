<?php

namespace Hap\EquiposBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Hap\EquiposBundle\Entity\Productos;
use Symfony\Component\Form\FormInterface;





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
            //->add('cantidad','choice')
            ->add('esAprobado','checkbox',array('label' => '¿Es aprobado el prestamo?'))
            ->add('cantidadAprobada')
            ->add('equipoPrestamo','entity',array(
                'class'=> 'HapEquiposBundle:Productos',
                'query_builder' => function (\Doctrine\ORM\EntityRepository $repository)
                             {
                                 return $repository->createQueryBuilder('s')
                                        ->where('s.esPrestamo = 1');
                             },
                'placeholder' => 'Seleccione una opción'))
        ;
        
        $formModifier = function (FormInterface $form, Productos $equipo = null) {
            $cantidad = null === $equipo ? array() : $equipo->getInventario();
                
                if(count($cantidad)>0)
                    $cantidad=array('1' => 'Uno');

                $form->add('cantidad', 'entity', array(
                    'class'       => 'HapEquiposBundle:Inventario',
                    'placeholder' => 'Seleccione una opción',
                    'choices'     => $cantidad,
                ));
        };
        
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();
                $formModifier($event->getForm(), $data->getEquipoPrestamo());
                
            }
        );
        
        
        $builder->get('equipoPrestamo')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $equipo = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $equipo);
            }
        );
        
        
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
