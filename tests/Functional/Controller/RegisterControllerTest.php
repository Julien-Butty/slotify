<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
    public function testRegister()
    {
        $client = static::createClient();
        $client->request('GET', '/register');

        $crawler = $client->submitForm('Save', [
            'registration_form[firstName]' => 'John',
            'registration_form[lastName]' => 'Doe',
            'registration_form[email]' => 'johndoe@mail.fr',
            'registration_form[plainPassword][first]' => 'azeRty@123',
            'registration_form[plainPassword][second]' => 'azeRty@123',
        ]);

        $client->followRedirect();

        $this->assertSelectorTextContains('p', 'Welcome ! Your account has been successfully created.');
    }
}
