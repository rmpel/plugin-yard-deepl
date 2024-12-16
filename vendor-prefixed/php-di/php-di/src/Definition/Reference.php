<?php
/**
 * @license MIT
 *
 * Modified by yardinternet on 16-December-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace YDPL\Vendor_Prefixed\DI\Definition;

use YDPL\Vendor_Prefixed\Psr\Container\ContainerInterface;

/**
 * Represents a reference to another entry.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class Reference implements Definition, SelfResolvingDefinition
{
    /** Entry name. */
    private string $name = '';

    /**
     * @param string $targetEntryName Name of the target entry
     */
    public function __construct(
        private string $targetEntryName,
    ) {
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function getTargetEntryName() : string
    {
        return $this->targetEntryName;
    }

    public function resolve(ContainerInterface $container) : mixed
    {
        return $container->get($this->getTargetEntryName());
    }

    public function isResolvable(ContainerInterface $container) : bool
    {
        return $container->has($this->getTargetEntryName());
    }

    public function replaceNestedDefinitions(callable $replacer) : void
    {
        // no nested definitions
    }

    public function __toString() : string
    {
        return sprintf(
            'get(%s)',
            $this->targetEntryName
        );
    }
}
