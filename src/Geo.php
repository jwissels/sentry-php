<?php

declare(strict_types=1);

namespace Sentry;

/**
 * This class stores the information about the authenticated user for a request.
 *
 * @see https://develop.sentry.dev/sdk/event-payloads/types/#geo
 */
final class Geo
{
    /**
     * @var string|null
     */
    private $city;

    /**
     * @var string|null
     */
    private $countryCode;

    /**
     * @var string|null
     */
    private $region;

    /**
     * Geo constructor.
     */
    public function __construct(
        ?string $city = null,
        ?string $countryCode = null,
        ?string $region = null
    ) {
        $this->setCity($city);
        $this->setCountryCode($countryCode);
        $this->setRegion($region);
    }

    /**
     * Gets the city of the user.
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Sets the city of the user.
     *
     * @param string|null $city The city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * Gets the country code of the user.
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * Sets the country code of the user.
     *
     * @param string|null $countryCode The country code
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * Gets the region of the user.
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * Sets the region of the user.
     *
     * @param string|null $region The region
     */
    public function setRegion(?string $region): void
    {
        $this->region = $region;
    }

    /**
     * Creates an instance of this object from the given data.
     *
     * @param array<string, mixed> $data The raw data
     */
    public static function createFromArray(array $data): self
    {
        $instance = new self();

        foreach ($data as $field => $value) {
            switch ($field) {
                case 'city':
                    $instance->setCity($value);
                    break;
                case 'country_code':
                    $instance->setCountryCode($value);
                    break;
                case 'region':
                    $instance->setRegion($value);
                    break;
                default:
                    break;
            }
        }

        return $instance;
    }
}
