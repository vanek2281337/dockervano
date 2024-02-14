<?php
namespace App\DTO\Notification;

final class CreateNotificationDTO
{
    public string $Title;
    public string|null $Description;
    public string|null $Image;

    public function __construct(string $Title, string|null $Description, string|null $Image)
    {
        $this->Title = $Title;
        $this->Description = $Description;
        $this->Image = $Image;
    }
}
