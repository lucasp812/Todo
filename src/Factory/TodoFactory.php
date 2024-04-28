<?php

namespace App\Factory;

use App\Entity\Todo;
use App\Repository\TodoRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Todo>
 *
 * @method static Todo|Proxy createOne(array $attributes = [])
 * @method static Todo[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Todo[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Todo|Proxy find(object|array|mixed $criteria)
 * @method static Todo|Proxy findOrCreate(array $attributes)
 * @method static Todo|Proxy first(string $sortedField = 'id')
 * @method static Todo|Proxy last(string $sortedField = 'id')
 * @method static Todo|Proxy random(array $attributes = [])
 * @method static Todo|Proxy randomOrCreate(array $attributes = [])
 * @method static Todo[]|Proxy[] all()
 * @method static Todo[]|Proxy[] findBy(array $attributes)
 * @method static Todo[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Todo[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static TodoRepository|RepositoryProxy repository()
 * @method Todo|Proxy create(array|callable $attributes = [])
 */
final class TodoFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'name' => self::faker()->text(),
            'done' => self::faker()->boolean(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Todo $todo): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Todo::class;
    }
}
