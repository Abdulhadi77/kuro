<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BFOTPlansDataTable;
use Carbon\Carbon;
use App\Models\BFOTPlan;

use App\Http\Controllers\Validations\BFOTPlansRequest;


class BFOTPlans extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:bfotplans_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:bfotplans_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:bfotplans_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:bfotplans_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}





            public function index(BFOTPlansDataTable $bfotplans)
            {
               return $bfotplans->render('admin.bfotplans.index',['title'=>trans('admin.bfotplans')]);
            }




            public function create()
            {

               return view('admin.bfotplans.create',['title'=>trans('admin.create')]);
            }



            public function store(BFOTPlansRequest $request)
            {
                $data = $request->except("_token", "_method");
				$data['image'] = "";
            	$data['admin_id'] = admin()->id();
		  		$bfotplans = BFOTPlan::create($data);
				if(request()->hasFile('image')){
					$bfotplans->image=  self::uploadImage($request->image,'bfot_plans');
					// $blogs->image = it()->upload('image','voteplans/'.$voteplans->id);
					$bfotplans->save();
				}
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('bfotplans'.$redirect), trans('admin.added'));
			}
			function uploadImage($image , $fileName)
			{
				$imageName =  time().'.'. $image->extension();
				$imageToSave = $fileName . DIRECTORY_SEPARATOR . time().'.'. $image->extension();

				$image->move(public_path('storage'. DIRECTORY_SEPARATOR .$fileName), $imageName);
				return $imageToSave;
			}


            public function show($id)
            {
        		$bfotplans =  BFOTPlan::find($id);
        		return is_null($bfotplans) || empty($bfotplans)?
        		backWithError(trans("admin.undefinedRecord"),aurl("bfotplans")) :
        		view('admin.bfotplans.show',[
				    'title'=>trans('admin.show'),
					'bfotplans'=>$bfotplans
        		]);
            }




            public function edit($id)
            {
        		$bfotplans =  BFOTPlan::find($id);
        		return is_null($bfotplans) || empty($bfotplans)?
        		backWithError(trans("admin.undefinedRecord"),aurl("bfotplans")) :
        		view('admin.bfotplans.edit',[
				  'title'=>trans('admin.edit'),
				  'bfotplans'=>$bfotplans
        		]);
            }




            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new BFOTPlansRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(BFOTPlansRequest $request,$id)
            {
              // Check Record Exists
              $bfotplans =  BFOTPlan::find($id);
              if(is_null($bfotplans) || empty($bfotplans)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("bfotplans"));
              }
              $data = $this->updateFillableColumns();
              $data['admin_id'] = admin()->id();

			  if($request->hasFile('image')){
                  $data['image']=  self::uploadImage($request->image,'bfot_plans');
				}
              BFOTPlan::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('bfotplans'.$redirect), trans('admin.updated'));
            }



	public function destroy($id){
		$bfotplans = BFOTPlan::find($id);
		if(is_null($bfotplans) || empty($bfotplans)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("bfotplans"));
		}
        if(!empty($bfotplans->image)){
			it()->delete($bfotplans->image);
		}
		it()->delete('bfotplan',$id);
		$bfotplans->delete();
		return redirectWithSuccess(aurl("bfotplans"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$bfotplans = BFOTPlan::find($id);
				if(is_null($bfotplans) || empty($bfotplans)){
					return backWithError(trans('admin.undefinedRecord'),aurl("bfotplans"));
				}
                if(!empty($bfotplans->image)){
					it()->delete($bfotplans->image);
				}
				it()->delete('bfotplan',$id);
				$bfotplans->delete();
			}
			return redirectWithSuccess(aurl("bfotplans"),trans('admin.deleted'));
		}else {
			$bfotplans = BFOTPlan::find($data);
			if(is_null($bfotplans) || empty($bfotplans)){
				return backWithError(trans('admin.undefinedRecord'),aurl("bfotplans"));
			}

			it()->delete('bfotplan',$data);
			$bfotplans->delete();
			return redirectWithSuccess(aurl("bfotplans"),trans('admin.deleted'));
		}
	}


}
