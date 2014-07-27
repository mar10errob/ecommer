<?php
// namespace SPV\ClienteBundle\Listener;

// use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
// use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Symfony\Component\Routing\Router;

// class LoginListener{

//     private $router, $email=null;

//     function __construct(Router $router)
//     {
//         $this->router = $router;
//     }


//     public function onSecurityInteractiveLogin(InteractiveLoginEvent $event){
//         $token = $event->getAuthenticationToken();
//         $this->email = $token->getUser()->getEmail();
//     }
//     public function onKernelResponse(FilterResponseEvent $event){
//         if(null!=$this->email){
//             $perfil=$this->router->generate('perfil');
//             $event->getResponse(new RedirectResponse($perfil));
//         }
//     }
// }