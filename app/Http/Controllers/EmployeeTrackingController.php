<?php

namespace App\Http\Controllers;

use App\employee_tracking;
use Illuminate\Http\Request;
use Auth;
use Session;
use Validator;

class EmployeeTrackingController extends Controller
{
    var $tracking;
    
    public function __construct()
    {
        $this->tracking= new employee_tracking;
    }
    
    public function employee()// ححساب موظف
    {
        $actions = $this->tracking->latest()->paginate(50);
        $actionsSize = $this->tracking->count();
        return view('admin/employee_tracking/employeeActions',compact('actions','actionsSize'));
    }

    public function newMonth4Employee(Request $request) //بدء شهر جديد لموظف
    {
        error_log(print_r($request->employee_name,true));
        $this->tracking->where('employee_name',$request->employee_name)->update(['valid'=>0]);
        return  redirect()->route('tracking.index')
        ->with('success','new month for employee '.strval($request->employee_name));
    }

    public function newMonth4All(Request $request)// بدء شهر جديد للكل
    {
        error_log(print_r($request->employee_name,true));
        $this->tracking->update(['valid'=>0]);
        return  redirect()->route('tracking.index')
        ->with('success','new month for all employee ');
    }

    public function employeeAccount(Request $request)//حساب موظف 
    {
        $money4employee=$this->tracking->where('employee_name',$request->employee_name)->where('valid',1)->sum('money');
        return  redirect()->route('tracking.index')
        ->with('success','the account for '.$request->employee_name . ' = ' .$money4employee );
    }

    public function userMoney(Request $request) // مبلغ المدفوع من المدير
    {
        $money4employee=$this->tracking->where('user_name',$request->user_name)->where('valid',1)->sum('money');
        return  redirect()->route('tracking.index')
        ->with('success','the account for '.$request->user_name . ' = ' .$money4employee );
    }



    public function index()// all category view
    {
        $actions = $this->tracking->latest()->paginate(50);
        $actionsSize = $this->tracking->count();
        return view('admin/employee_tracking/emplyeeTrackingCRUD',compact('actions','actionsSize'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'employee_name' => 'required',
            'money' => 'required'
        ]);
        $this->tracking->employee_name = $request->employee_name;
        $this->tracking->money = $request->money;
        $this->tracking->reason = $request->reason;
        $this->tracking->date = $request->date;
        $this->tracking->user_name = Auth::user()->name;
        $this->tracking->save();
        return  redirect()->route('tracking.index')
        ->with('success','Action Created successfully.');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'money' => 'required'
        ]);
        if ($validator->passes()) {
            $this->tracking->where('id',$id)->update(['money'=>$request->money]);
            Session::flash('success', 'Category has been updated successfully!');
            return response()->json(['success'=>'done']);
        }
        Session::flash('errors', $validator->errors());
        return response()->json("error happen in update");
    }
    public function destroy($id)
    {
        
        $ids = explode(",", $id);
        // error_log(print_r($ids,true));
        if(sizeof($ids)!=0&&is_numeric($ids[0]))
        {
            Session::flash('success', 'action has been deleted successfully!');
            $this->tracking->whereIn('id', $ids)->delete();
            
            return response()->json(['success'=>'done']);
        }
        return response()->json("error happen in delete");
            
    }
}