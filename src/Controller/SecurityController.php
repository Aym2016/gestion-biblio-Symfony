<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends AbstractController
{





    /**
     * @Route("/security", name="security")
     */
    public function index()
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
    /**
    *@route("/connexion" , name="security_login")
    */
    public function login(Request $request,AuthenticationUtils $authenticationUtils){
        //solution1
        return new Response($this->render('security/login.html.twig',[
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError()]));
         //solution 2
        /*$error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();*/
        //$form = $this->createForm(LoginType::class);*/


      /* return $this->render('security/login.html.twig');, array(
            'last_username' => $lastUsername,
            'error'         => $error,));
            //'form'          => $form->createView()));*/

    	//return $this->render('security/login.html.twig');*/

    } 
    /**
    *@route("/deconnexion" , name="security_logout")
    */
    public function logout(){}	

    /**
    *@route("/inscription" , name="security_registation")
    */
    public function registration(Request $request,UserPasswordEncoderInterface $encodeur)
    { $user=new User();
       $form=$this->createForm(RegistrationType::class, $user);
       $form->handleRequest($request);
    	if($form->isSubmitted() && $form->IsValid())
    		{
    			$hash=$encodeur->encodePassword($user,$user->getPassword());
    			$user->setPassword($hash);

    			$entityManager=$this->getDoctrine()->getManager();
    			$entityManager->persist($user);
    			$entityManager->flush();
    			return $this->redirectToRoute('security_login');
           	}
         return $this->render('security/registration.html.twig',['form'=>$form->createView()]);

    }	
     



}
