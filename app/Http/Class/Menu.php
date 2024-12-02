<?php

namespace App\Http\Class;

class Menu
{
    public function __construct(
        private string $menuName,
        private string $menuId,
        private string $menuIcon
    )
    {}

    public function getMenuName() : string
    {
        return $this->menuName;
    }

    public function getMenuId() : string
    {
        return $this->menuId;
    }

    public function getMenuIcon() : string
    {
        return $this->menuIcon;
    }
}