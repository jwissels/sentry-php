<?php

declare(strict_types=1);

namespace Sentry\Tests;

use PHPUnit\Framework\TestCase;
use Sentry\Geo;

final class GeoTest extends TestCase
{
    public function testGettersAndSetters(): void
    {
        $geo = new Geo();
        $geo->setCity('my_city');
        $geo->setCountryCode('AT');
        $geo->setRegion('my_region');

        $this->assertSame('my_city', $geo->getCity());
        $this->assertSame('AT', $geo->getCountryCode());
        $this->assertSame('my_region', $geo->getRegion());
    }

    /**
     * @dataProvider createFromArrayDataProvider
     */
    public function testCreateFromArray(array $data, ?string $expectedCity, ?string $expectedCountryCode, ?string $expectedRegion): void
    {
        $geo = Geo::createFromArray($data);

        $this->assertSame($expectedCity, $geo->getCity());
        $this->assertSame($expectedCountryCode, $geo->getCountryCode());
        $this->assertSame($expectedRegion, $geo->getRegion());
    }

    public function createFromArrayDataProvider(): iterable
    {
        yield [
            [],
            null,
            null,
            null,
        ];

        yield [
            ['city' => 'my_city'],
            'my_city',
            null,
            null,
        ];

        yield [
            ['country_code' => 'AT'],
            null,
            'AT',
            null,
        ];

        yield [
            ['region' => 'my_region'],
            null,
            null,
            'my_region',
        ];

        yield [
            ['city' => 'my_city', 'country_code' => 'AT', 'region' => 'my_region'],
            'my_city',
            'AT',
            'my_region',
        ];
    }
}
