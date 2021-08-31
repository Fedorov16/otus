<?php

namespace App\Entity;

interface MetaTimestampsInterface
{
    public function setCreatedAt(): void;

    public function setUpdatedAt(): void;
}
