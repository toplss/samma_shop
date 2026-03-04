<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\RedisTrait;
use Debugbar;
use App\Services\MallMainServices;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class IntroController extends Controller
{
    use RedisTrait;


    public function intro(Request $request)
    {
        try {
            $redis_key_generate = 'intro';

            if (Redis::exists($redis_key_generate)) {

                $data = self::getReids($redis_key_generate);

            } else {
                $service = new MallMainServices;

                $left_banner 	= $service->getBanner('renew_intro', 1);
                $right_banner 	= $service->getBanner('renew_intro_right', 2);
                $right_bottom 	= $service->getBanner('renew_intro_bottom', 1);


                $data = [
                    'left_banner'   => $service->makeBannerDiv($left_banner, 'N'),
                    'right_banner'  => $service->makeBannerDiv($right_banner, 'grid-item grid-item--width1'),
                    'right_bottom'  => $service->makeBannerDiv($right_bottom, 'N'),
                ];

                self::setRedis($redis_key_generate, $data);
            }

            // if (session('ss_mb_code')) {
            //     return redirect()->route('/');
            // }

            return view('intro', $data);

        } catch (\Exception $e) {
            return view('intro', [
                // 'error' => $e->getMessage()
            ]);
        }
    }



    public function intro2(Request $request)
    {
        try {

            $redis_key_generate = 'intro';

            if (Redis::exists($redis_key_generate)) {

                $data = self::getReids($redis_key_generate);

            } else {
                $service = new MallMainServices;

                $left_banner 	= $service->getBanner('renew_intro', 1);
                $right_banner 	= $service->getBanner('renew_intro_right', 2);
                $right_bottom 	= $service->getBanner('renew_intro_bottom', 1);


                $data = [
                    'left_banner'   => $service->makeBannerDiv($left_banner, 'N'),
                    'right_banner'  => $service->makeBannerDiv($right_banner, 'grid-item grid-item--width1'),
                    'right_bottom'  => $service->makeBannerDiv($right_bottom, 'N'),
                ];

                self::setRedis($redis_key_generate, $data);
            }

            if (session('ss_mb_code')) {
                return redirect()->route('/');
            }

            return view('intro2', $data);

        } catch (\Exception $e) {
            return view('intro2', [
                // 'error' => $e->getMessage()
            ]);
        }
    }
}
