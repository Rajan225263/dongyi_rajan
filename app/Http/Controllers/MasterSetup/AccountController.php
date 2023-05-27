<?php

/**

 * User: Rajan
 * Date: 26/05/2023

 */

namespace App\Http\Controllers\MasterSetup;


use App\Model\Account;
use App\Http\Controllers\Controller;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AccountRequest;
use Auth;

class AccountController extends Controller
{

    public function __construct()
    {
    }


    // Author Rajan Bhatta

    public function index()
    {

        $data = Account::orderBy('id', 'desc')->get();

        return view('masterSetup.account.index', compact('data'));
    }


    public function create()
    {
        $data = new Account();
        $title = "Create";

        return view('masterSetup.account.form', compact('data', 'title'));
    }

    public function store(AccountRequest $request)
    {

        //print_r($request->all());
        //exit;

        try {
            if ($request->isMethod("POST")) {
                $account = new Account();
                $request['created_by'] = Auth::user()->id;
                //$request['status']= 1;
                $account->fill($request->all());
                $result = $account->save();

                if ($result) {
                    return redirect()->route('account.index')->with('success', 'Data Saved successfully');
                } else {
                    return redirect()->route('account.create')->with('error', 'Data does not save successfully')->withInput();
                }
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            $customMessage = "Exception! Something went wrong please try again!";

            \Session::flash('error', $customMessage, true);
            return redirect()->back()->withInput(); //If you want to go back

        }
    }


    public function edit($id)
    {
        $data = Account::findOrFail($id);
        $title = "Edit";
        return view('masterSetup.account.form', compact('data', 'title'));
    }

    public function update(AccountRequest $request, $id)
    {

        try {
            if ($request->isMethod("PUT")) {
                //Process 
                $accountEloquent = Account::find($id);
                $request['updated_by'] = Auth::user()->id;
                $result = $accountEloquent->update($request->all());

                if ($result) {
                    return redirect()->route('account.index')->with('success', 'Data Updated successfully');
                } else {
                    return redirect()->route('account.edit', [$id])->with('error', 'Data does not update successfully')->withInput();
                }
            }
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            $customMessage = "Exception! Something went wrong please try again!";

            \Session::flash('error', $customMessage, true);
            return redirect()->back()->withInput(); //If you want to go back
        }
    }

    public function destroy(Request $request)
    {
        try {
            if ($request->id) {
                $accountEloquent = Account::find($request->id);
                $response = $accountEloquent->delete();
               
            }
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            $customMessage = "Exception! Something went wrong please try again!";

            \Session::flash('error', $customMessage, true);
            return redirect()->back()->withInput(); //If you want to go back
        }
    }
}
