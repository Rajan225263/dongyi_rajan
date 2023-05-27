<?php



namespace App\Http\Controllers\MasterSetup;


use App\Model\Transaction;
use App\Model\Account;
use App\Http\Controllers\Controller;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\TransactionRequest;
use Auth;

class TransactionController extends Controller
{

    public function __construct()
    {
    }


    // Author Rajan Bhatta

    public function index()
    {

        $data = Transaction::with('account')->orderBy('id', 'desc')->get();
     
       
        return view('masterSetup.transaction.index', compact('data'));
    }


    public function create()
    {
        $data = new Transaction();
        $title = "Create";

        $accountList = Account::pluck('name', 'id');

        return view('masterSetup.transaction.form', compact('data', 'title', 'accountList'));
    }

    public function store(TransactionRequest $request)
    {

        if ($request->isMethod("POST")) {
            $transaction = new Transaction();

            $result = $transaction->saveData($request->all());
            $message = $result['message'];

            if ($result['status']) {
                return redirect()->route('transaction.index')->with('success', $message);
            } else {
                return redirect()->route('transaction.create')->with('error', $message)->withInput();
            }
        }
    }


    public function edit($id)
    {
        $data = Transaction::findOrFail($id);
        $title = "Edit";
        $accountList = Account::pluck('name', 'id');
        return view('masterSetup.transaction.form', compact('data', 'title', 'accountList'));
    }

    public function update(TransactionRequest $request, $id)
    {

      if ($request->isMethod("PUT")) {

                $transaction = new Transaction();

                $result = $transaction->updateData($request->all(), $id);
                $message = $result['message'];

                if ($result['status']) {
                    return redirect()->route('transaction.index')->with('success', $message);
                } else {
                    return redirect()->route('transaction.create')->with('error', $message)->withInput();
                }
            }
        
    }

    // Created By : Rajan Bhatta

    public function destroy(Request $request)
    {
        try {
            if ($request->id) {
                $transactionEloquent = Transaction::find($request->id);
                $response = $transactionEloquent->delete();
            }
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            $customMessage = "Exception! Something went wrong please try again!";

            \Session::flash('error', $customMessage, true);
            return redirect()->back()->withInput(); //If you want to go back
        }
    }
}
