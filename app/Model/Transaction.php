<?php

namespace App\Model;

use App\Model\Account;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    // use SoftDeletes;

    protected $table = "transactions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'account_id', 'amount', 'type', 'date', 'created_by', 'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        ''
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function saveData($requetData)
    {

        $transaction = new Transaction();
        $account = Account::where('id', $requetData['account_id'])->first();

        //----------Data Ready For Transction------------
        $requetData['created_by'] = Auth::user()->id;
        $requetData['date'] =  date('Y-m-d', strtotime($requetData['date']));
        $transaction->fill($requetData);

        //------------Data Ready-For Accounts--------------
        $account->balance = $requetData['amount'];
        $account->updated_by = Auth::user()->id;

        DB::beginTransaction();
        try {

            //  -------------------Transaction Data Save------------------------
            $transaction->save();

            if ($transaction->id) {
                $account->update();
                $message = "Transaction Created Successfully!";
                $status = 1;
                DB::commit();
            } else {
                $message = "Transaction does not Created Successfully!";
                $status = 0;
            }

            $result_array = array(
                'status' => 1,
                'message' => $message
            );

            return $result_array;
        } catch (\Exception $e) {

            DB::rollback();
            $message = $e->getMessage();
            $customMessage = "Exception! Something went wrong please try again!";

            $result_array = array(
                'status' => 1,
                'message' => $message
            );

            return $result_array;
        }
    }

    public function updateData($requetData, $id)
    {

        $transaction = Transaction::find($id);
        $account = Account::where('id', $requetData['account_id'])->first();

        //----------Data Ready For Transction------------
        $requetData['updated_by'] = Auth::user()->id;
        $requetData['date'] =  date('Y-m-d', strtotime($requetData['date']));
        $transaction->fill($requetData);

        //------------Data Ready-For Accounts--------------
        $account->balance = $requetData['amount'];
        $account->updated_by = Auth::user()->id;

        DB::beginTransaction();
        try {

            //  -------------------Transaction Data Save------------------------
            $transaction->save();

            if ($transaction->id) {
                $account->update();
                $message = "Transaction Updated Successfully!";
                $status = 1;
                DB::commit();
            } else {
                $message = "Transaction does not Updated Successfully!";
                $status = 0;
            }

            $result_array = array(
                'status' => 1,
                'message' => $message
            );

            return $result_array;
        } catch (\Exception $e) {

            DB::rollback();
            $message = $e->getMessage();
            $customMessage = "Exception! Something went wrong please try again!";

            $result_array = array(
                'status' => 1,
                'message' => $customMessage
            );

            return $result_array;
        }
    }
}
