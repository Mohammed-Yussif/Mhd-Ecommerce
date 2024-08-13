<?php
 
namespace InnoShop\Panel\Controllers;

use Illuminate\Support\Facades\Auth;

class LogoutController extends BaseController
{
    /**
     * @return mixed
     */
    public function index(): mixed
    {
        $admin = Auth::guard('admin')->user();
        Auth::guard('admin')->logout();

        return redirect(panel_route('login.index'))
            ->with('instance', $admin);
    }
}
