<?php

namespace App\Services;

use App\Models\NotificationCenter;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class SendPulseService
{
    protected $client;
    protected $apiUrl;
    protected $apiToken;
    protected $phoneNumberId;
    // EAADUZC9VvnDoBO7sMUhcHA7ne37GZBvMFF6jUZACHcNLghnymcghzTUciQeIFQLqXy706Pn3kIU20DBMKijWsN6tUCADOjEg8F3Lv6bxsBaLtuq1QYZAUmr7Xwfhq4GO36AIeT2uvSDaxfAh8ELvRei5l4FZAeavE2wQE57nRitB8tZAFXAn6qhPpALGwpDgZDZD
    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = 'https://graph.facebook.com/v22.0';
        $this->apiToken = 'EAADUZC9VvnDoBOzZAiJmW77ZAZCrh72Pio1DEZCITAbHQDVxA2urp2NJNJ1g4KZBqNHRQnViMfAGvZC0uW1Sald1m4yAgP3Tm9B0zrOlGpGEZAMZApR2OX9SZC6cvohVjDYXdX4BSLDdgRYsIn8C2tZCCGiujHPkHsGCGvdJ46Cjo5jgtz0c1TNcrhxEYupWPGk1gZDZD';
        $this->phoneNumberId = '672049855981227';
    }
   
    protected function sendMessageIfEnabled(string $phone, array $payload, string $templateName): array
    {
       
        $url = "{$this->apiUrl}/{$this->phoneNumberId}/messages";


        $response = Http::withToken($this->apiToken)->post($url, $payload);
        return $response->json();
    }
   
    public function sendVisitorCustomer($phone,$name)
    {
        $url = "{$this->apiUrl}/{$this->phoneNumberId}/messages";
        $templateName = "visitor_customer_message";
        $payload = [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $phone,
            'type' => 'template',
            "template" => [
                "name" => $templateName,
                "components" => [
                    [
                        "type" => "body",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => $name
                            ],
                            [
                                "type" => "text",
                                "text" => $name
                            ]
                        ]
                    ],
                 
                ],
                "language" => [
                    "policy" => "deterministic",
                    "code" => "en"
                ]
            ],
        ];
        return $this->sendMessageIfEnabled($phone, $payload, $templateName);
    }
    public function sendVisitorEmployer($phone, $name)
    {
        $url = "{$this->apiUrl}/{$this->phoneNumberId}/messages";
        $templateName = "visitor_employee_message";
        $payload = [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $phone,
            'type' => 'template',
            "template" => [
                "name" => $templateName,
                "components" => [
                    [
                        "type" => "body",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => $name
                            ],
                            [
                                "type" => "text",
                                "text" => $name
                            ]
                        ]
                    ],

                ],
                "language" => [
                    "policy" => "deterministic",
                    "code" => "en"
                ]
            ],
        ];
        return $this->sendMessageIfEnabled($phone, $payload, $templateName);
    }
   
}
