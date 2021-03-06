<?php declare(strict_types=1);

namespace Pehapkari\Statie\Posts\Year2017\ListeningNetteComponents\Component\AddToBasketControl;

interface AddToBasketControlFactoryInterface
{
    /**
     * @param string[]|int[] $product
     */
    public function create(array $product): AddToBasketControl;
}
