<?php
namespace App\DTO\Menu;

final class UpdateMenuDTO
{
    public int $id;
    public int $CategoryId;
    public string $Title;
    public string $Description;
    public string|null $Image;
    public float $Price;
    public string|null $Slug;

    public function __construct(int $id, int $CategoryId, string $Title, string $Description,
                                string $Image, float $Price, string|null $Slug)
    {
        $this->id = $id;
        $this->CategoryId = $CategoryId;
        $this->Title = $Title;
        $this->Description = $Description;
        $this->Image = $Image;
        $this->Price = $Price;
        $this->Slug = $Slug;
    }
}
