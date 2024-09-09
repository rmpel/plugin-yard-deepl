<?php
/**
 * @license MIT
 *
 * Modified by yardinternet on 09-September-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace YardDeepl\Vendor_Prefixed\Illuminate\Support\Facades;

use Illuminate\Queue\Worker;
use YardDeepl\Vendor_Prefixed\Illuminate\Support\Testing\Fakes\QueueFake;

/**
 * @method static \YardDeepl\Vendor_Prefixed\Illuminate\Contracts\Queue\Job|null pop(string $queue = null)
 * @method static \YardDeepl\Vendor_Prefixed\Illuminate\Contracts\Queue\Queue setConnectionName(string $name)
 * @method static int size(string $queue = null)
 * @method static mixed bulk(array $jobs, mixed $data = '', string $queue = null)
 * @method static mixed later(\DateTimeInterface|\DateInterval|int $delay, string|object $job, mixed $data = '', string $queue = null)
 * @method static mixed laterOn(string $queue, \DateTimeInterface|\DateInterval|int $delay, string|object $job, mixed $data = '')
 * @method static mixed push(string|object $job, mixed $data = '', $queue = null)
 * @method static mixed pushOn(string $queue, string|object $job, mixed $data = '')
 * @method static mixed pushRaw(string $payload, string $queue = null, array $options = [])
 * @method static string getConnectionName()
 * @method static void assertNotPushed(string|\Closure $job, callable $callback = null)
 * @method static void assertNothingPushed()
 * @method static void assertPushed(string|\Closure $job, callable|int $callback = null)
 * @method static void assertPushedOn(string $queue, string|\Closure $job, callable $callback = null)
 * @method static void assertPushedWithChain(string $job, array $expectedChain = [], callable $callback = null)
 *
 * @see \Illuminate\Queue\QueueManager
 * @see \Illuminate\Queue\Queue
 */
class Queue extends Facade
{
    /**
     * Register a callback to be executed to pick jobs.
     *
     * @param  string  $workerName
     * @param  callable  $callback
     * @return void
     */
    public static function popUsing($workerName, $callback)
    {
        return Worker::popUsing($workerName, $callback);
    }

    /**
     * Replace the bound instance with a fake.
     *
     * @return \YardDeepl\Vendor_Prefixed\Illuminate\Support\Testing\Fakes\QueueFake
     */
    public static function fake()
    {
        static::swap($fake = new QueueFake(static::getFacadeApplication()));

        return $fake;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'queue';
    }
}
