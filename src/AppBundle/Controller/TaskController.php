<?php

namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Task;
use AppBundle\Entity\Client;
use AppBundle\Entity\Product;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\TaskType;




class TaskController extends Controller
{

	public function newAction($id,Request $request){
		

		$task = new Task();
		if($id != -1){
			$em = $this->getDoctrine()->getManager();
			$client = $em->getRepository('AppBundle:Client')->find($id);
			$task ->setClient($client);
		}
		$task->setStartDate(date("d-m-Y"));
		
		$form = $this->createForm(new TaskType(), $task);

        $form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()){
			
			$task = $form->getData();		
			$em = $this->getDoctrine()->getManager();
			$em->persist($task);
			$em->flush();
			
			if($form->get('saveAndAdd')->isClicked()){
					
				return $this->redirectToRoute('new_task');
			
			}
			return $this->redirectToRoute('list_task');
			
		}
		
		return $this->render('AppBundle:Task:NewTask.html.twig', array('form'=>$form->createView()));;
	
}		
		
	
	public function listAction(){
		$em = $this->getDoctrine()->getRepository('AppBundle:Task');
		$task = $em->findAll();
	
		return $this->render('AppBundle:Task:ListTask.html.twig', array('task'=>$task));;
	
	}
	
	public function showAction($id){
			
		$task = $this->getDoctrine()
		->getRepository('AppBundle:Task')
		->find($id);
	
		if (!$task) {
				
			return new Response('Tarea id: '.$id. ' no encontrada');
		}
	
		return $this->render('AppBundle:Task:ShowTask.html.twig', array('task'=>$task));;
	}
	
	public function deleteAction($id){
	
		$em = $this->getDoctrine()->getManager();
		$task = $em->getRepository('AppBundle:Task')->find($id);
		$em->remove($task);
		$em->flush();
	
		return $this->render('Task/DeleteTask.html.twig', array('task'=>$task));
	}
	
	public function editAction($id, Request $request){
	
		$em = $this->getDoctrine()->getManager();
		$task = $em->getRepository('AppBundle:Task')->find($id);
		
		$form = $this->createForm(new TaskType(), $task);
		
		$form->handleRequest($request);
		
		if($form->isValid()){
			$task = $form->getData();
			$em = $this->getDoctrine()->getManager();
			$em->persist($task);
			$em->flush();
		
			return $this->redirectToRoute('list_task');
		}
		return $this->render('AppBundle:Task:NewTask.html.twig', array('form'=>$form->createView()));;
	}
		
		public function searchTaskAction(Request $request){
			$task = new Task();
		
			$data = array();
		
			$form = $this->createFormBuilder($data, ['translation_domain' => 'AppBundle'])
				->add('id', 'text', array(
							'label' => 'task.id',
							'required'=> false
					))
				/*->add('falla', 'text', array(
							'label' => 'falla',
							'required'=> false
					))
				->add('cliente', 'text', array(
							'label' => 'cliente',
							'required'=> false
					))*/
				->add('send', SubmitType::class, array('label'=>'task.search.searchTask'))
					
				->getForm();
						
			$form->handleRequest($request);
					
			if ($form->isValid()) {	
				$data = $form->getData();
				$id = $data['id'];
				//$falla =$data['falla'];
				//$cliente = $data['cliente];
				//var_dump($data);
				//var_dump($id);
				$repository = $this->getDoctrine()
				->getRepository('AppBundle:Task');
				$query = $repository->createQueryBuilder('t')
				->where('t.id = :task')
				->setParameter('task', $id)
				
				->getQuery();
				//$task = $query->getResult();
				$task = $query->setMaxResults(1)->getOneOrNullResult();
				
				
				if(!$task){
					return new Response('La tarea no encontrada');
				}
				return $this->redirectToRoute('show_task', array('id' => $task->getId()), 301);
				//return $this->render('Task/ListSearchTask.html.twig', array('task'=>$task));;
			}
		return $this->render('AppBundle:Task:SearchTask.html.twig', array('form'=>$form->createView()));;
		}
}
