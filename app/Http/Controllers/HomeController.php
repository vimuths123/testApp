<?php

namespace App\Http\Controllers;

use App\Interfaces\UrlRepositoryInterface;
use Illuminate\Http\Request;
use Session;
use App\Http\Traits\urlTrait;

class HomeController extends Controller
{
    use urlTrait;
    private $urlRepository;

    public function __construct(UrlRepositoryInterface $urlRepository)
    {
        $this->urlRepository = $urlRepository;
    }

    /**
     * Display home page.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $outputurl = "";
        if ($request->isMethod('post')) {
            $input = $request->validate([
                'url' => 'required|url|unique:urls,url'
            ]);

            $this->urlRepository->createUrl([
                'url' => $request->post('url'),
                'code' => $this->generateRandomString(5)
            ]);
            $outputurl = url('/' . $this->generateRandomString(5));
        }
        return view('welcome', get_defined_vars());
    }

    
    

    public function redirect($sring)
    {
        $url = $this->urlRepository->getUrlByCode($sring);
        if ($url) {
            $this->urlRepository->updateLastVisited($sring);
            return redirect($url->url);
        } else {
            Session::flash('message', "Don't have that url in our db");
            Session::flash('alert-class', 'alert-danger');
            return redirect('/');
        }
    }
}
