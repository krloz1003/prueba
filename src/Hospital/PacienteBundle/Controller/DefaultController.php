<?php

namespace Hospital\PacienteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Hospital\PacienteBundle\Entity\Paciente;
use Hospital\PacienteBundle\Entity\Ingreso;
use Hospital\PacienteBundle\Form\PacienteType;
use Hospital\PacienteBundle\Form\IngresoType;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PacienteBundle:Default:index.html.twig',
        	array('name' => "Sus datos se guardaron correctamente...")
        );
    }

    
    /**
     * @Route("/forms/otm/new", name="examples_forms_one_to_many_create")
     * @Template("PacienteBundle:Default:new.html.twig")
     */
    public function oneToManynewAction(Request $request)
    {
        $paciente = new Paciente();

        $form = $this->createForm(new PacienteType(), $paciente);

        if ($request->isMethod("POST")) {
            $form->bind($request);

            if($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                //$em->persist($paciente);
                var_dump($paciente);die;

                return $this->redirect($this->generateUrl('examples_forms'));

            }
        }

        return array(
            'form' => $form->createView()
        );
    }

    public function newAction()
    {
    	$peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $paciente = new Paciente();
        $ingreso = new Ingreso();

        $formulario = $this->createForm(new PacienteType(), $paciente);

        $formulario->handleRequest($peticion);

        if ($formulario->isValid())
        {        	
        	$ingreso->setPaciente($paciente);
        	//var_dump($ingreso);die;
        	$em->persist($paciente);
            $em->flush();

        }

		return $this->render('PacienteBundle:Default:new.html.twig', array(
			'form' => $formulario->createView(),
		));

    }

    public function crearAction()
    {        
    	$paciente = new Paciente();
    	$paciente->setExpediente('1288031001');
    	$paciente->setPaterno('AVILA');
    	$paciente->setMaterno('AGUILAR');
    	$paciente->setNombre('CARLOS');

    	$ingreso = new Ingreso();
    	$ingreso->setEdoSalud('BUENO');
    	$ingreso->setIngreso('HOY');
    	$ingreso->setMedico('LOPEZ ROSAS');
    	$ingreso->setPaciente($paciente);


    	$em = $this->getDoctrine()->getEntityManager();
    	$em->persist($paciente);
    	$em->persist($ingreso);    	
    	//$em->flush();

    	var_dump($ingreso);die;
    	


    	/*$post = $em->getRepository('PacienteBundle:Paciente')->find($paciente->getId());
    	$ingreso = new Ingreso();
    	$ingreso->setEdoSalud('Bueno');
    	$ingreso->setIngreso('Hoy');
    	$ingreso->setMedico('Lopez Rosa');
    	$ingreso->setOwner($post);

    	$em->persist($ingreso);    	
    	$em->flush();    	

		var_dump($ingreso);die;*/
        
        return $this->render('PacienteBundle:Default:index.html.twig', array('name' => $paciente->getId()));
    }
    
}
