<?php

namespace App\DTOs;

class TaskDTO
{

    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $priority,
        public readonly int $status_id,
        public readonly int $user_id
        ){

    }
}