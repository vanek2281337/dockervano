<?php
namespace App\DTO\Notification;

final class UpdateNotificationDTO
{
    public int $Id;
    public string $Title;
    public string|null $Description;
    public string|null $Image;

    public function __construct(int $Id, string $Title, string|null $Description, string|null $Image)
    {
        $this->Id = $Id;
        $this->Title = $Title;
        $this->Description = $Description;
        $this->Image = $Image;
    }
}
