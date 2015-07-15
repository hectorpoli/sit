<?php

namespace Hap\EquiposBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;

class InventarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productos',null,array('label' => 'Tipo Producto: '))
            ->add('modelo','text',array('label' => 'Modelo: '))
            ->add('marca','text',array('label' => 'Marca: '))
            ->add('color','text',array('label' => 'Color: '))
            ->add('serial','text',array('label' => 'Serial: '))
            ->add('numerobien','text',array('label' => 'Número de Bien: '))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hap\EquiposBundle\Entity\Inventario'
        ));
    }

    public function getName()
    {
        return 'hap_equiposbundle_inventario';
    }
}
