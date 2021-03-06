<?php

declare(strict_types=1);

namespace Tipoff\Notes\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Tipoff\Notes\Models\Note;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $noteables = [
            app('user'),
            app('order'),
        ];
        $noteableType = $this->faker->randomElement($noteables);

        return [
            'noteable_type' => get_class($noteableType),
            'noteable_id' => randomOrCreate($noteableType),
            'content' => $this->faker->sentences(3, true),
            'creator_id' => randomOrCreate(app('user')),
            'updater_id' => randomOrCreate(app('user')),
        ];
    }
}
