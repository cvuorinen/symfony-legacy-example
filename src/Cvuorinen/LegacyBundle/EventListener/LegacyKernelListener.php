<?php

namespace Cvuorinen\LegacyBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class LegacyKernelListener
 *
 * Listens to kernel exceptions and hands all NotFoundHttpExceptions to the legacy kernel.
 * This allows to write new parts of the system using Symfony and every route that is not
 * found in symfony will be handled by the legacy application.
 *
 * @package EventListener
 */
class LegacyKernelListener implements EventSubscriberInterface
{
    /**
     * @var HttpKernelInterface
     */
    private $legacyKernel;

    /**
     * @param HttpKernelInterface $legacyKernel
     */
    public function __construct(HttpKernelInterface $legacyKernel)
    {
        $this->legacyKernel = $legacyKernel;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::EXCEPTION => array('onKernelException', 512),
        );
    }

    /**
     * Handles all NotFoundHttpExceptions and hands them over to legacy kernel
     *
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof NotFoundHttpException) {
            // Handle request with legacy kernel and set response
            $request = $event->getRequest();
            $response = $this->legacyKernel->handle($request);

            // Override 404 status code with 200
            $response->headers->set('X-Status-Code', 200);

            $event->setResponse($response);
        }
    }
}
