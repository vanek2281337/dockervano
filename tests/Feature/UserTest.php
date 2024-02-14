<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Domain\Services\UserServices;
use App\DTO\User\CreateUserDTO;
use App\DTO\User\CodeUserDTO;
use App\DTO\User\AuthUserDTO;
use App\DTO\User\ShowByPhoneUserDTO;
use App\DTO\User\UpdateUserDTO;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test create.
     */
    public function test_create(): void
    {
        $service = new UserServices();
        $data = $service->CreateAction(
            new CreateUserDTO(null, null, '+7 (999) 345-55-66', null)
        );

        $this->assertNotNull($data);
        $this->assertEquals($data->FirstName, null);
        $this->assertEquals($data->Phone, '+7 (999) 345-55-66');
    }

    /**
     * A basic feature test create.
     */
    public function test_code(): void
    {
        $service = new UserServices();
        $dataCreate = $service->CreateAction(
            new CreateUserDTO(null, null, '+7 (999) 345-55-66', null)
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->FirstName, null);
        $this->assertEquals($dataCreate->Phone, '+7 (999) 345-55-66');
        $this->assertEquals($dataCreate->Code, null);

        $data = $service->CodeAction(
            new CodeUserDTO($dataCreate->Phone, $service->generateRandomString())
        );

        $this->assertNotNull($data);
        $this->assertEquals($data["code"], 'ok');
    }

    /**
     * A basic feature test create.
     */
    public function test_auth(): void
    {
        $service = new UserServices();
        $dataCreate = $service->CreateAction(
            new CreateUserDTO(null, null, '+7 (999) 345-55-66', null)
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->FirstName, null);
        $this->assertEquals($dataCreate->Phone, '+7 (999) 345-55-66');
        $this->assertEquals($dataCreate->Code, null);

        $data = $service->AuthAction(
            new AuthUserDTO($dataCreate->Phone, '000000')
        );

        $this->assertNotNull($data);
        $this->assertNotNull($data["user"]);
        $this->assertNotNull($data["bearerTocken"]);
        $this->assertEquals($data["user"]->Phone, '+7 (999) 345-55-66');
        $this->assertEquals(strlen($data["bearerTocken"]) > 0, true);
    }

    /**
     * A basic feature test create.
     */
    public function test_show_by_phone(): void
    {
        $service = new UserServices();
        $dataCreate = $service->CreateAction(
            new CreateUserDTO(null, null, '+7 (999) 345-55-66', null)
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->FirstName, null);
        $this->assertEquals($dataCreate->Phone, '+7 (999) 345-55-66');
        $this->assertEquals($dataCreate->Code, null);

        $data = $service->ShowByPhoneAction(
            new ShowByPhoneUserDTO('+7 (999) 345-55-66')
        );

        $this->assertNotNull($data);
    }

    /**
     * A basic feature test create.
     */
    public function test_user(): void
    {
        $service = new UserServices();
        $dataCreate = $service->CreateAction(
            new CreateUserDTO(null, null, '+7 (999) 345-55-66', null)
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->FirstName, null);
        $this->assertEquals($dataCreate->Phone, '+7 (999) 345-55-66');
        $this->assertEquals($dataCreate->Code, null);

        $data = $service->UpdateAction(
            new UpdateUserDTO(
                $dataCreate->id,
                'Иосиф',
                'Сталин',
                null
            )
        );

        $this->assertNotNull($data);
        $this->assertEquals($data->FirstName, 'Иосиф');
        $this->assertEquals($data->LastName, 'Сталин');
    }
}
