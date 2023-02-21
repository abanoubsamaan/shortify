<?php

namespace App\Services;

use App\Models\Setting;

class CounterService
{
    public function __construct(private ServiceFactory $serviceFactory)
    {
    }

    public function getUniqueID(): string
    {
        $counterValue = $this->getNextCounterValue();
        $baseConversion = $this->serviceFactory->createBaseConversionService();

        return $baseConversion->base10toBase62($counterValue);
    }

    private function getNextCounterValue()
    {
        return Setting::where('key', 'counter_number')->firstOrFail()->value + 1;
    }
}
