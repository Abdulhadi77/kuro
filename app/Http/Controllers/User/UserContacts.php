<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\DataTables\UserContactsDataTable;
use Carbon\Carbon;
use App\Models\Contact;

use App\Http\Controllers\Validations\UserContactsRequest;

class UserContacts extends Controller
{

	  public function __construct() {

	  }

	
    public function index(UserContactsDataTable $contacts){
        return $contacts->render('user.contacts.index',['title'=>trans('user.requests')]);
      }


    public function create(){     	
        return view('user.contacts.create',['title'=>trans('user.create')]);
      }

    public function store(UserContactsRequest $request){
      $data = $request->except("_token", "_method");
      $data['user_id'] = auth()->user()->id; 
      $data['name'] = auth()->user()->name;
      $data['email'] = auth()->user()->email;
      $contacts = Contact::create($data); 
      $redirect = isset($request["add_back"])?"/create":"";
      return redirectWithSuccess(url('user/contacts'.$redirect), trans('user.added'));
    }

    public function show($id){
      $contacts =  Contact::find($id);
      return is_null($contacts) || empty($contacts)?
        		backWithError(trans("user.undefinedRecord"),aurl("contacts")) :
        		view('user.contacts.show',[
				    'title'=>trans('user.show'),
					'contacts'=>$contacts
        		]);
      }
}