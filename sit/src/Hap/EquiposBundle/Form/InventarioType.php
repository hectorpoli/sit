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
            ->add('marca',null,array('label' => 'Marca: '))
            ->add('modelo','text',array('label' => 'Modelo: '))
            ->add('descripcion',null,array('label' => 'Descripción: '))
            ->add('serial','text',array('label' => 'Serial: '))
            ->add('numerobien','text',array('label' => 'Número de Bien: '))
<<<<<<< HEAD
            ->add('cantidad','text',array('label' => 'Cantidad: '))
=======
            ->add('departamento',null,array('label' => 'Ubicación fisica: '))
>>>>>>> 221b68fe1bea992581c6e902f2c4d59dade04c76
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
