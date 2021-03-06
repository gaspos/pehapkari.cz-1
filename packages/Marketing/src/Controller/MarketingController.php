<?php declare(strict_types=1);

namespace Pehapkari\Marketing\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class MarketingController extends AbstractController
{
    /**
     * @Route(path="/zviditelnete-vasi-firmu", name="sponsoring")
     */
    public function default(): Response
    {
        // how to auto-complete:
        // "/packages/Provision/templates/provision/default.twig"
        return $this->render('marketing/sponsoring.twig');
    }
}
