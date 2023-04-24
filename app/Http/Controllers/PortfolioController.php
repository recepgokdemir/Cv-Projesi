<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $list = Portfolio::all();

        return view('admin.portfolio.list', compact('list'));
    }

    public function create()
    {

        return view("admin.portfolio.create-update");

    }

    public function store(PortfolioRequest $request)
    {

        $data = $request->except("_token");

        Portfolio::create($data);
        return redirect()->route("portfolio.list");

    }

    public function edit(Request $request, Portfolio $portfolio)
    {

        return view("admin.portfolio.create-update",compact("portfolio"));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->except("_token");

        $data['status'] = isset($data['status']) ? 1 : 0;
        $portfolio->update($data);
        alert()->success('Başarılı', "Portföy bilgileri güncellendi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);

        return redirect()->route("portfolio.list");
    }

    public function changeStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $portfolioID = $request->portfolioID;
        $portfolio = Portfolio::query()
            ->where("id", $portfolioID)
            ->first();

        if ($portfolio) {
            $portfolio->status = $portfolio->status ? 0 : 1;
            $portfolio->save();

            return response()
                ->json(['status' => "success", "message" => "Başarılı", "data" => $portfolio, "portfolio_status" => $portfolio->status])
                ->setStatusCode(200);
        }

        return response()
            ->json(['status' => "error", "message" => "Portföy bulunamadı"])
            ->setStatusCode(404);

    }

    public function delete(Request $request)
    {
        $portfolioID = $request->portfolioID;

        $portfolio = Portfolio::query()
            ->where("id", $portfolioID)
            ->first();
        if ($portfolio) {
            $portfolio->delete();
            return response()
                ->json(['status' => "success", "message" => "Başarılı", "data" => ""])
                ->setStatusCode(200);
        }
        return response()
            ->json(['status' => "error", "message" => "Portföy bilgileri bulunamadı"])
            ->setStatusCode(404);
    }
}
