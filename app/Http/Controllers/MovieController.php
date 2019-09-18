<?php namespace App\Http\Controllers;

use App\Repositories\AuditRepository as Audit;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Redirect;
use Setting;

class MovieController extends Controller
{
    /**
     * @param Application $app
     * @param Audit $audit
     */
    public function __construct(Application $app, Audit $audit)
    {
        parent::__construct($app, $audit);
        // Set default crumbtrail for controller.
        session(['crumbtrail.leaf' => 'movie']);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        $homeRouteName = 'welcome';

        try {
            $homeCandidateName = Setting::get('app.home_route');
            $homeRouteName = $homeCandidateName;
        }
        catch (Exception $ex) { } // Eat the exception will default to the welcome route.

        $request->session()->reflash();
        return Redirect::route($homeRouteName);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome(Request $request)
    {
        $page_title = trans('general.text.welcome');
        $page_description = "This is the welcome page";

//        $request->flashExcept(['password', 'password_confirmation']);
        $request->session()->reflash();
        return view('welcome', compact('page_title', 'page_description'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all(Request $request)
    {
        $page_title = trans('general.text.welcome');
        $page_description = "This is the movie page";

        //récupérer les données sur les films
        //$json = file_get_contents('/var/www/lesk/database/movie_ids_09_16_2019.json');
        $json = file_get_contents('/var/www/lesk/database/test.json');

//        $request->flashExcept(['password', 'password_confirmation']);
        $request->session()->reflash();
        return view('movie/all', compact('test', 'json', 'page_title', 'page_description'));
    }

}
