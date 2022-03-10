<?php declare(strict_types=1);

namespace App\SwagAppsystem;

class Event
{
    /**
     * @var string
     */
    private $shopUrl;

    /**
     * @var string
     */
    private $shopId;

    /**
     * @var int
     */
    private $appVersion;

    /**
     * @var array
     */
    private $eventData;

    private int $timestamp;

    private string $shopVersion;

    private string $contextLanguage;

    private string $userLanguage;

    public function __construct(
        string $shopUrl,
        string $shopId,
        int $appVersion,
        array $eventData,
        int $timestamp,
        string $shopVersion,
        string $contextLanguage,
        string $userLanguage
    ) {
        $this->shopUrl = $shopUrl;
        $this->shopId = $shopId;
        $this->appVersion = $appVersion;
        $this->eventData = $eventData;
        $this->timestamp = $timestamp;
        $this->shopVersion = $shopVersion;
        $this->contextLanguage = $contextLanguage;
        $this->userLanguage = $userLanguage;
    }

    public function getShopUrl(): string
    {
        return $this->shopUrl;
    }

    public function getShopId(): string
    {
        return $this->shopId;
    }

    public function getAppVersion(): int
    {
        return $this->appVersion;
    }

    public function getEventData(): array
    {
        return $this->eventData;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getShopVersion(): string
    {
        return $this->shopVersion;
    }

    /**
     * @return string
     */
    public function getContextLanguage(): string
    {
        return $this->contextLanguage;
    }

    /**
     * @return string
     */
    public function getUserLanguage(): string
    {
        return $this->userLanguage;
    }
}
