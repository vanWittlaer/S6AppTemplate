<?php declare(strict_types=1);

namespace App\Controller;

use App\SwagAppsystem\Client;
use App\SwagAppsystem\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerAddressController extends AbstractController
{
    /**
     * @Route("/customer/address/written", name="customer_address.written", methods={"POST"})
     */
    public function addressWritten(Client $client, Event $event): Response
    {
        $data = $event->getEventData();
        $id = $data['payload'][0]['primaryKey'];

        // use the Client object to interact directly via Shopware Admin API
        $result = $client->search('customer-address', ['ids' => [$id]]);
        $lastName = '> customer not found <';
        if ($result['total'] > 0 && isset($result['data'][0]['lastName'])) {
            $lastName = $result['data'][0]['lastName'];
        }

        // use the native Http client for http level communication
        $client->getHttpClient()->post('/api/notification', [
                'json' => [
                        'status' => 'success',
                        'message' => sprintf(
                                'This is a message from your new app. You have just changed an address for customer %s',
                                $lastName
                        ),
                        'adminOnly' => 'true',
                        'requiredPrivileges' => [],
                ],
        ]);

        return new Response();
    }
}