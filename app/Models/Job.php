<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
  public static function all(): array
  {
    return [
      [
        'id' => 1,
        'title' => 'Teacher',
        'salary' => 7500
      ],
      [
        'id' => 2,
        'title' => 'Programmer',
        'salary' => 8500
      ],
      [
        'id' => 3,
        'title' => 'Proctologist',
        'salary' => 9500
      ]
    ];
  }

  public static function find(int $id): array
  {
    $job = Arr::first(self::all(), fn($job) => $job['id'] === $id);

    if (!$job) {
      abort(404);
    }

    return $job;
  }
}