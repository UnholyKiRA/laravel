<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Image;

class PortfolioController extends Controller
{
    public function AllPortfolio(){

        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all',compact('portfolio'));

    }//End Method

    public function AddPortfolio(){

        return view('admin.portfolio.portfolio_add');

    }//End Method

    public function StorePortfolio(Request $request){

        $request->validate([
            'portfolio_name' =>'required',
            'portfolio_name' =>'required',
            'portfolio_name' =>'required',
        ],[
            'portfolio_name.required' => 'Portfolio name is Required',
            'portfolio_title.required' => 'Portfolio Title is Required',
        ]);
        
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(636,852)->save('upload/home_slide/'.$name_gen);
            $save_url = 'upload/home_slide/'.$name_gen;

            Portfolio::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url,

            ]); 
            $notification = array(
            'message' => 'Home Slide Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//End Method

}
