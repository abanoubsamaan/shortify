<?php

namespace App\Http\Controllers;

use App\Exceptions\UnableToUpdateCounterException;
use App\Http\Requests\ShortUrlRequest;
use App\Models\Setting;
use App\Models\ShortUrl;
use App\Services\ServiceFactory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Throwable;

class ShortUrlController extends Controller
{
    public function __construct(private ServiceFactory $serviceFactory)
    {
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('index');
    }

    /**
     * @throws Throwable
     */
    public function store(ShortUrlRequest $request): View
    {
        /** @smell We could add captcha check before sending the request **/
        $shortUrl = $this->generateUrl();
        $this->updateCounter();
        $result = ShortUrl::create(['long_url' => $request->input('url'), 'short_url' => $shortUrl]);

        return view('index')->with('shortenerResult', $result->short_url);
    }

    private function generateUrl(): string
    {
        $urlGeneratorService = $this->serviceFactory->createUrlGeneratorService();
        return $urlGeneratorService->generateShortUrl();
    }

    /**
     * @throws Throwable
     */
    private function updateCounter()
    {
        try{
            Setting::where(['key' => 'counter_number'])->increment('value', 1);
        }
        catch (Throwable $e)
        {
            throw new UnableToUpdateCounterException();
        }
    }

    /**
     * @param string $id
     * @return Redirector|Application|RedirectResponse
     */
    public function show(string $id): Redirector|Application|RedirectResponse
    {
        return redirect($this->getLongUrl(uniqueId: $id));
    }

    /**
     * @param string $uniqueId
     * @return string
     */
    private function getLongUrl(string $uniqueId): string
    {
        $retrieveLongUrlService = $this->serviceFactory->createRetrieveLongUrlService();
        return $retrieveLongUrlService->execute($uniqueId);
    }

}
