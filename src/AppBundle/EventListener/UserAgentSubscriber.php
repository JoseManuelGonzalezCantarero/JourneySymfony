<?php

namespace AppBundle\EventListener;


use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class UserAgentSubscriber implements EventSubscriberInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $this->logger->info('RRRRAAAAAAAAAAAAAAWWWWR');
        $request = $event->getRequest();
        $userAgent = $request->headers->get('User-Agent');
        $this->logger->info('The user agent is: '.$userAgent);

        if(rand(0, 100) > 50)
        {
            //$response = new Response('Come back later!');
            //$event->setResponse($response);
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            // kernel.request
            KernelEvents::REQUEST => 'onKernelRequest'
        );
    }
}