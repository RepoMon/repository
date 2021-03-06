<?php

use Silex\WebTestCase;

/**
 * @group integration
 *
 * @author timrodger
 * Date: 18/03/15
 */
class AppErrorIntegrationTest extends WebTestCase
{
    /**
     * @var \Symfony\Component\HttpKernel\Client
     */
    private $client;

    public function createApplication()
    {
        putenv('REDIS_PORT=tcp://172.17.0.154:9999');
        return require __DIR__.'/../../app.php';
    }

    /**
     * @expectedException Ace\Repository\Store\UnavailableException
     */
    public function testListRepositoriesFails()
    {
        $this->givenAClient();
        $this->client->request('GET', '/repositories');

        $this->thenTheResponseIs500();
    }

    private function givenAClient()
    {
        $this->client = $this->createClient();
    }


    private function thenTheResponseIs500()
    {
        $this->assertSame(500, $this->client->getResponse()->getStatusCode());
    }

    protected function assertResponseContents($expected_body)
    {
        $this->assertSame($expected_body, $this->client->getResponse()->getContent());
    }
}
