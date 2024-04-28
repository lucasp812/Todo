<?php

namespace App\Factory;

use App\Entity\Priority;
use App\Repository\PriorityRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Priority>
 *
 * @method static Priority|Proxy createOne(array $attributes = [])
 * @method static Priority[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Priority[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Priority|Proxy find(object|array|mixed $criteria)
 * @method static Priority|Proxy findOrCreate(array $attributes)
 * @method static Priority|Proxy first(string $sortedField = 'id')
 * @method static Priority|Proxy last(string $sortedField = 'id')
 * @method static Priority|Proxy random(array $attributes = [])
 * @method static Priority|Proxy randomOrCreate(array $attributes = [])
 * @method static Priority[]|Proxy[] all()
 * @method static Priority[]|Proxy[] findBy(array $attributes)
 * @method static Priority[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Priority[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PriorityRepository|RepositoryProxy repository()
 * @method Priority|Proxy create(array|callable $attributes = [])
 */
final class PriorityFactory extends ModelFactory
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
            'level' => self::faker()->randomNumber(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Priority $priority): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Priority::class;
    }
}
