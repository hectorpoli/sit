<?php

namespace Hap\EquiposBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\View\TwitterBootstrapView;

use Hap\EquiposBundle\Entity\Inventario;
use Hap\EquiposBundle\Form\InventarioType;
use Hap\EquiposBundle\Form\InventarioFilterType;

use Doctrine\ORM\Query;
use Pagerfanta\Adapter\ArrayAdapter;


/**
 * Inventario controller.
 *
 * @Route("/inventario")
 */
class InventarioController extends Controller
{
    /**
     * Lists all Inventario entities.
     *
     * @Route("/", name="inventario")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter(1);

        list($entities, $pagerHtml) = $this->paginator($queryBuilder,1);

        return array(
            'entities' => $entities,
            'pagerHtml' => $pagerHtml,
            'filterForm' => $filterForm->createView(),
        );
    }
    
    /**
     * Lists all Inventario entities.
     *
     * @Route("/detalle/{id}", name="inventario_detalle")
     * @Method("GET")
     * @Template()
     */
    public function detalleAction($id)
    {
        list($filterForm, $queryBuilder) = $this->filter(0,$id);

        list($entities, $pagerHtml) = $this->paginator($queryBuilder,0);

        return array(
            'entities' => $entities,
            'pagerHtml' => $pagerHtml,
            'filterForm' => $filterForm->createView(),
        );
    }

    /**
    * Create filter form and process filter request.
    *
    */
    protected function filter($t=0,$id=0)
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $filterForm = $this->createForm(new InventarioFilterType());
        $em = $this->getDoctrine()->getManager();
        if($t==0){
            $queryBuilder = $em->getRepository('HapEquiposBundle:Inventario')->createQueryBuilder('e')->where('e.marca='.$id);
        }else if($t==1){
            /*$queryBuilder = $em->getRepository('HapEquiposBundle:Inventario')->createQueryBuilder('e')
                    ->select('e,count(e.id) as total')
                    ->innerJoin('HapEquiposBundle:Productos','p','WITH','p.id=e.productos')
                    ->groupBy('e.productos,e.marca');
             */
            
            $sql="select p.nombreProducto,m.nombreMarca,m.id as marca_id,count(i.id) as total "
                    . "from HapEquiposBundle:Inventario i "
                    . "inner join HapEquiposBundle:Productos p WITH p.id=i.productos  "
                    . "inner join HapEquiposBundle:Marca m WITH m.id=i.marca  "
                    . "group by i.productos,i.marca";
            $query = $em->createQuery($sql);
            $queryBuilder = $query->getResult(Query::HYDRATE_ARRAY);
            
        }
        
        

        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('InventarioControllerFilter');
        }

        // Filter action
        if ($request->get('filter_action') == 'filter') {
            // Bind values from the request
            $filterForm->bind($request);

            if ($filterForm->isValid()) {
                // Build the query from the given form object
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                // Save filter to session
                $filterData = $filterForm->getData();
                $session->set('InventarioControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('InventarioControllerFilter')) {
                $filterData = $session->get('InventarioControllerFilter');
                $filterForm = $this->createForm(new InventarioFilterType(), $filterData);
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
            }
        }

        return array($filterForm, $queryBuilder);
    }

    /**
    * Get results from paginator and get paginator view.
    *
    */
    protected function paginator($queryBuilder,$t=0)
    {
        // Paginator
        if($t==0)
            $adapter = new DoctrineORMAdapter($queryBuilder);
        else if($t==1)
            $adapter = new ArrayAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage(3);
        $currentPage = $this->getRequest()->get('page', 1);
        $pagerfanta->setCurrentPage($currentPage);
        $entities = $pagerfanta->getCurrentPageResults();

        // Paginator - route generator
        $me = $this;
        $routeGenerator = function($page) use ($me)
        {
            return $me->generateUrl('inventario', array('page' => $page));
        };

        // Paginator - view
        $translator = $this->get('translator');
        $view = new TwitterBootstrapView();
        $pagerHtml = $view->render($pagerfanta, $routeGenerator, array(
            'proximity' => 3,
            'prev_message' => $translator->trans('views.index.pagprev', array(), 'JordiLlonchCrudGeneratorBundle'),
            'next_message' => $translator->trans('views.index.pagnext', array(), 'JordiLlonchCrudGeneratorBundle'),
        ));

        return array($entities, $pagerHtml);
    }

    /**
     * Creates a new Inventario entity.
     *
     * @Route("/", name="inventario_create")
     * @Method("POST")
     * @Template("HapEquiposBundle:Inventario:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Inventario();
        $form = $this->createForm(new InventarioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('inventario_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Inventario entity.
     *
     * @Route("/new", name="inventario_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Inventario();
        $form   = $this->createForm(new InventarioType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Inventario entity.
     *
     * @Route("/{id}", name="inventario_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HapEquiposBundle:Inventario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inventario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Inventario entity.
     *
     * @Route("/{id}/edit", name="inventario_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HapEquiposBundle:Inventario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inventario entity.');
        }

        $editForm = $this->createForm(new InventarioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Inventario entity.
     *
     * @Route("/{id}", name="inventario_update")
     * @Method("PUT")
     * @Template("HapEquiposBundle:Inventario:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HapEquiposBundle:Inventario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inventario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new InventarioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('inventario_edit', array('id' => $id)));
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.update.error');
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Inventario entity.
     *
     * @Route("/{id}", name="inventario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HapEquiposBundle:Inventario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Inventario entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('inventario'));
    }

    /**
     * Creates a form to delete a Inventario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
