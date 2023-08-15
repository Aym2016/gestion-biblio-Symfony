<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LivreRepository;
use knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {  
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    /*
    *@route("/toutleslivres, name="allbooks")
    */
    /*public function allbooks(LivreRepository $Livre ,Request $Request,PaginatorInterface $paginator){
     $livres->$paginator->paginate(
     	$LivreRepository->getAllbooks(),
     	
     	$Request->Query()->getInt('page',1),4);
     return $this->render('default/allbooks.html.twig',[

      'livres'=>$livres
     ]




     );
    
    




    }*/

     


   /* public function allbook()


    public function livreparcat()*/



    /**
     * @Route("/recherchepartitre", name="findbytitle")
     */
   /* public function findbytitle(Request $request,LivreRepository $LivreRepository)
    {   $livres=[];
    	$titre="";
    	$etat=false;
    	if($request->getMethod()=="POST")
    	{
    		$titre = $request->request->get('titre');
    		$livre = $LivreRepository->findBy(['titre'=>$titre]);   
    		$etat =true;
    	}
        return $this->render('default/index.html.twig', [
        	'livres'=> $livres ,
        	'titre' => $titre,
        	'etat'  => $etat 
        	

        ]);
    }*/
     
}
