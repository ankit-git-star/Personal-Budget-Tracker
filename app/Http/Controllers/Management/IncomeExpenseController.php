<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Record;
use App\Models\Category;
use DB;
use Validator;
use Auth;
use Session;

class IncomeExpenseController extends Controller
{
    public function viewIncomeExpenseForm(){

        if(Auth::check()){
            $categorys = Category::all();
            return view('pages.add-record',  compact('categorys'));
        }else{
            return redirect()->intended('/');
        }
    }

    public function addIncomeExpense(Request $request){

        $validator = Validator::make($request->all(),[
            'amount' => 'required',
            'date' => 'required',
            'type' => 'required',
            'description' => 'required',

        ]);

        if($validator->fails()){
            return redirect('/record')->withErrors($validator)->withInput();
        }else{
            
            $record = new Record;
            $user_id = Auth::id();
            $record->user_id = $user_id;
            $record->amount = $request->amount;
            $record->date = $request->date;
            $record->type = $request->type;
            $record->category = $request->category;
            $record->description = $request->description;
            $record->save();
            
            return redirect('/record')->with('success'," Add Record successfully.");

        }

    }

    public function getIncomeExpenseList(){

        if(Auth::check()){
            $user_id = Auth::id();
            $records = Record::where('user_id', $user_id)->get();
            return view('pages.view-all-records', compact('records'));
        }else{
            return redirect()->intended('/');  
        }
    }

    public function editRecordForm(Request $request,$id){

        if(Auth::check()){
            $encryptedId = $id;
            $decryptedId = Crypt::decrypt($encryptedId);
            $record = Record::findOrFail($decryptedId);
            $categorys = Category::all();
            return view('pages.edit-record', compact('record','categorys'));
        }else{
            return redirect()->intended('/');
        }
    }

    public function updateRecordDetails(Request $request,$id){

        if(Auth::check()){
            $encryptedId = $id;
            $decryptedId = Crypt::decrypt($encryptedId);
            $record = Record::find($decryptedId);
            $record->amount = $request->input('up_amount');
            $record->date = $request->input('up_date');
            $record->type = $request->input('up_type');
            $record->category = $request->input('up_category');
            $record->description = $request->input('up_description');
            $record->save();

            return redirect()->back()->with('status','Details Updated successfully!');
        }else{
           return redirect()->intended('/');  
        }
    }

    public function delRecord($id){

        if(Auth::check()){
            $encryptedId = $id;
            $decryptedId = Crypt::decrypt($encryptedId);
            $candidate = Record::find($decryptedId);
            if ($candidate) {
                $candidate->delete();
                return redirect()->back()->with('success', 'Record deleted successfully!');
            } else {
                return redirect()->back()->withErrors(['error' => 'Record not found.']);
            }
        }else {
            return redirect()->intended('/'); 
        }
    }

    public function viewCategoryForm(){

        if(Auth::check()){
            //$categorys = Category::all();
            return view('pages.add-category');
        }else{
            return redirect()->intended('/');
        }

    }

    public function addCategory(Request $request){

        $validator = Validator::make($request->all(),[
            'category' => 'required',

        ]);

        if($validator->fails()){
            return redirect('/category')->withErrors($validator)->withInput();
        }else{
            
            $category = new Category;
            $user_id = Auth::id();
            //$category->user_id = $user_id;
            $category->category_name = $request->category;
            $category->save();
            
            return redirect('/category')->with('success'," Add Catetory successfully.");

        }

    }
}
