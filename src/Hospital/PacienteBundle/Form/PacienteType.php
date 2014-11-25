<?php
namespace Hospital\PacienteBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Hospital\PacienteBundle\Entity\Ingreso;

class PacienteType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('expediente','text', [
					'label'	=>	'* Expediente',
					'attr'	=>	[
						'placeholder'	=>	'AI-AN-MN-DN-CC',
					],
				])
				->add('paterno', 'text', [
					'label'	=>	'* Apellido Paterno',
				])
				->add('materno','text', [
					'label'	=>	'* Apellido Materno',
				])
				->add('nombre', 'text', [
					'label'	=>	'* Nombre (s)',
				])
				->add('ingresos', 'collection', array(
					'type'				=> new IngresoType(),
					'label'				=> 'Ingresos',
					'by_reference'		=> false,
					'prototype'	=> new Ingreso(),
					'allow_delete'		=> true,
					'allow_add'			=> true,
					'attr'				=> array(
						'class' 		=> 'row ingresos'
					)
				));


				//->add('ingreso', new IngresoType());

	}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults(array(
    		'data_class' => 'Hospital\PacienteBundle\Entity\Paciente',
    	));
    }

	public function getName()
	{
		return 'paciente';
	}
}