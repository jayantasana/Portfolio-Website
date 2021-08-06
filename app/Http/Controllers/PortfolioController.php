<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class PortfolioController extends Controller
{
    function PortfolioAdd(){
        return view('backend.portfolio.portfolio_add');
    }

    function PortfolioStore(Request $request){
        if ($request->hasFile('thumbnail') & $request->hasFile('image')) {
            $thumbnail = $request->file('thumbnail');
            $image = $request->file('image');

            $ext = Str::random(10) . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->save(public_path('portfolio/' . $ext));

            $extension = Str::random(10) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('portfolio/' . $extension));

            $portfolio = new Portfolio;
            $portfolio->category = $request->category;
            $portfolio->portfolio_link = $request->portfolio_link;
            $portfolio->thumbnail = $ext;
            $portfolio->image = $extension;
            $portfolio->save();
        }
        return back()->with('PortfolioStore', "Portfolio Added Successfully");;
    }

    function PortfolioList(){
        $portfolios = Portfolio::paginate();
        $trashportfolio = Portfolio::onlyTrashed()->get();
        return view('backend.portfolio.portfolio_list',[
            'portfolios' => $portfolios,
            'trashportfolio' => $trashportfolio,
        ]);
    }

    function PortfolioEdit($id){
        $portfolio = Portfolio::where('id', $id)->first();
        return view('backend.portfolio.portfolio_edit',[
            'portfolio' => $portfolio,
        ]);
    }

    function PortfolioUpdate(Request $req){
        if ($req->hasFile('thumbnail') & $req->hasFile('image')) {
            $thumbnail = $req->file('thumbnail');
            $image = $req->file('image');

            $ext = Str::random(10) . '.' . $thumbnail->getClientOriginalExtension();
            $portfolioupdate = Portfolio::findOrFail($req->portfolio_id);
            $old_img_location = public_path('portfolio/' . $portfolioupdate->thumbnail);
            if (file_exists($old_img_location)) {
                unlink($old_img_location);
            }

            $extension = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $old_img_location = public_path('portfolio/' . $portfolioupdate->image);
            if (file_exists($old_img_location)) {
                unlink($old_img_location);
            }

            Image::make($thumbnail)->save(public_path('portfolio/' . $ext));
            Image::make($image)->save(public_path('portfolio/' . $extension));

            $portfolioupdate->thumbnail = $ext;
            $portfolioupdate->image = $extension;
        }
        $portfolioupdate->category = $req->category;
        $portfolioupdate->portfolio_link = $req->portfolio_link;
        $portfolioupdate->save();

        return back()->with('PortfolioUpdate', "Portfolio Update Successfully");
    }

    function PortfolioDelete($id){
        Portfolio::findOrFail($id)->delete();
        return back()->with('PortfolioDelete', "Portfolio Delete Successfully");
    }

    function PortfolioRestore($id){
        Portfolio::withTrashed()->findOrFail($id)->restore();
        return back()->with('PortfolioRestore', "Portfolio Restore Successfully");

    }

    function PortfolioParmanentDelete($id){
        Portfolio::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('PortfolioParmanentDelete', "Portfolio Parmanent Delete Successfully");
    }

}
