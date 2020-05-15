<?php


namespace App\Tests\CoursPHPUnit;


use PHPUnit\Framework\TestCase;

class GithubProviderTest extends TestCase
{

    private $client;
    private $serializer;
    private $streamedResponse;
    private $response;

    public function setUp(): void //Grace à cette fonciton, plus besoin d'initialiser
                                  // toute cette partie (init au début de chaque test)
    {
        $this->client = $this->getMockBuilder('GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->setMethodsExcept(['get'])
            ->getMock();

        $this->serializer = $this
            ->getMockBuilder('JMS\Serializer\Serializer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->streamedResponse = $this
            ->getMockBuilder('Psr\Http\Message\StreamInterface')
            ->getMock();

        $this->response = $this
            ->getMockBuilder('Psr\Http\Message\ResponseInterface')
            ->getMock();
    }

    public function testLoadByUserName()
    {
        $clientGit = $this
            ->getMockBuilder("GuzzleHttp\Client")
            ->disableOriginalConstructor()
            ->setMethodsExcept(["get"])
            ->getMock();

        $jmsSerialize = $this
            ->getMockBuilder("JMS\Serializer\Serializer")
            ->disableOriginalConstructor()
            ->getMock();

        $response = $this
            ->getMockBuilder("Psr\Http\Message\ResponseInterface")
            ->getMock();

        $clientGit->method("get")->willReturn($response);

        $streamedResponse = $this
            ->getMockBuilder('Psr\Http\Message\StreamInterface')
            ->getMock();
        $response->method('getBody')->willReturn($streamedResponse);

        $userData = ['login' => 'a login', 'name' => 'user name', 'email' => 'adress@mail.com', 'avatar_url' => 'url to the avatar', 'html_url' => 'url to profile'];
        $jmsSerialize->method('deserialize')->willReturn($userData);

        $gitHubUserProvider = new GithubUserProvider($clientGit, $jmsSerialize);

        $expectedUser = new User($userData['login'], $userData['name'], $userData['email'], $userData['avatar_url'], $userData['html_url']);

        $user = $gitHubUserProvider->loadByUserName("an-access-token");

        $this->assertEquals($expectedUser, $user);

        $this->assertEquals("AppBundle\Entity\User", get_class($user));
    }

    public function testLoadByUserNameException()
    {
        $clientGit = $this
            ->getMockBuilder("GuzzleHttp\Client")
            ->disableOriginalConstructor()
            ->setMethodsExcept(["get"])
            ->getMock();

        $jmsSerialize = $this
            ->getMockBuilder("JMS\Serializer\Serializer")
            ->disableOriginalConstructor()
            ->getMock();

        $response = $this
            ->getMockBuilder("Psr\Http\Message\ResponseInterface")
            ->getMock();

        $clientGit->method("get")->willReturn($response);

        $streamedResponse = $this
            ->getMockBuilder('Psr\Http\Message\StreamInterface')
            ->getMock();
        $response->method('getBody')->willReturn($streamedResponse);

        $jmsSerialize->method('deserialize')->willReturn([]);

        $this->expectException("\LogicException");

        $gitHubUserProvider = new GithubUserProvider($clientGit, $jmsSerialize);

        $gitHubUserProvider->loadByUserName("bad access token");
    }

    public function tearDown(): void
    {
        $this->client = null;
        $this->serializer = null;
        $this->streamedResponse = null;
        $this->response = null;
    }

}