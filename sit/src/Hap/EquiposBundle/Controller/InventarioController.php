<?php

namespace Hap\EquiposBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class InventarioController extends Controller
{
    /**
     * @Route("/nuevosEquipos")
     * @Template("HapEquiposBundle:Inventario:nuevoEquipo.html.twig")
     */
    public function nuevosEquiposAction()
    {
        return array(
                // ...
            );    }

}
