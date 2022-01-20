<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShourtRequest;
use App\Models\ShortUrl;
class ShortUrlController extends Controller
{
    //
    public function short(ShourtRequest $request){

        if($request->url){

            $new_url = ShortUrl::create([
                'orignal_url'=>$request->url
            ]);
            if($new_url){
                $short_url = base_convert($new_url->id,10,36);
                $new_url->update([
                    'short_url'=>$short_url
                ]);
                return redirect()->back()->with('success_message','<span style="color:rgb(20, 13, 53);"> Your Short Link :</span> <a style="color: #2bc933" href="'. url($short_url).'">'. url($short_url).'</a>');
            }
        }
        return back();
    }

    public function show($code){
        $short_url = ShortUrl::where('short_url',$code)->first();
        if($short_url){
            return redirect()->to(url($short_url->orignal_url));
        }
        return redirect()->to(url('/'));
    }
}
