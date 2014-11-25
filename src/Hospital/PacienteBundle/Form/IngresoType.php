<?php
namespace Hospital\PacienteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IngresoType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{			
			$builder				
				->add('edoSalud')
				->add('ingreso')		
				->add('medico');
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'Hospital\PacienteBundle\Entity\Ingreso',					
		));
	}

	public function getName()
	{
		return 'ingreso';
	}
}