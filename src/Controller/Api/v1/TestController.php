<?php
namespace App\Controller\Api\v1;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/** @Route("/api/test") */
class TestController extends AbstractController
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    /**
     * @Route("", methods={"GET"})
     * @return Response
     */
    public function getBlackLists(): Response
    {
        $blackLists = [
            [
                'value' => 1,
                'label' => 'PIPCU'
            ],
            [
                'value' => 2,
                'label' => 'unibet exclude'
            ],
            [
                'value' => 3,
                'label' => 'gary.gillies1281@gmail.com exclude'
            ],
            [
                'value' => 4,
                'label' => 'The Infringing Website List (IWL)'
            ],
            [
                'value' => 5,
                'label' => 'ibrahimozturkofficial@gmail.com exclude'
            ],
            [
                'value' => 7,
                'label' => 'erubio'
            ],
            [
                'value' => 8,
                'label' => 'editec'
            ],
            [
                'value' => 9,
                'label' => 'Bet365 IWL'
            ],
        ];
        return new JsonResponse(($blackLists), 200);
    }
    /**
     * @Route("/domains", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function getDomains(Request $request): Response
    {
        $id = $request->query->get('id');
        $domains1 = [
            '11.com',
            '22.com',
            '33.com',
            '44.com',
            '55.com',
            '66.com',
            '77.com',
            '88.com',
            '99.com',
            '11.com',
            '11.com',
            '22.com',
            '33.com',
            '44.com',
            '55.com',
            '66.com',
            '77.com',
            '88.com',
            '99.com',
            '11.com',
            '11.com',
            '22.com',
            '33.com',
            '44.com',
            '55.com',
            '66.com',
            '77.com',
            '88.com',
            '99.com',
            '11.com',
            '11.com',
            '22.com',
            '33.com',
            '44.com',
            '55.com',
            '66.com',
            '77.com',
            '88.com',
            '99.com',
            '11.com',
            '11.com',
            '22.com',
            '33.com',
            '44.com',
            '55.com',
            '66.com',
            '77.com',
            '88.com',
            '99.com',
            '11.com',
            '11.com',
            '22.com',
            '33.com',
            '44.com',
            '55.com',
            '66.com',
            '77.com',
            '88.com',
            '99.com',
            '11.com',
            '11.com',
            '22.com',
            '33.com',
            '44.com',
            '55.com',
            '66.com',
            '77.com',
            '88.com',
            '99.com',
            '11.com',
        ];
        $domainsOther = [
            '1.com',
            '2.com',
            '3.com',
            '4.com',
        ];
        if ((int)$id === 1) {
            return new JsonResponse(($domains1), 200);
        }
        if ((int)$id === 10) {
            return new JsonResponse(([]), 200);
        }
        return new JsonResponse(($domainsOther), 200);
    }
    /**
     * @Route("", methods={"POST"})
     * @param Request $request
     * @return Response
     * @throws \JsonException
     */
    public function newBlackList(Request $request): Response
    {
        $newBlackList = [
            'value' => 10,
            'label' => json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR)['blackListName']
        ];
        return new JsonResponse(($newBlackList), 200);
    }
    /**
     * @Route("/domains", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function addDomains(Request $request): Response
    {
        return new JsonResponse((null), 200);
    }
}