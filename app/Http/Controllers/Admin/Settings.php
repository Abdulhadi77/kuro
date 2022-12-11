<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class Settings extends Controller {

	public function __construct() {

		$this->middleware('AdminRole:settings_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:settings_edit', [
			'only' => ['store'],
		]);

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.settings', ['title' => trans('admin.settings')]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$rules = [
			'sitename_en' => 'required',
			'email' => 'required',
			'logo' => 'sometimes|nullable|' . it()->image(),
			'icon' => 'sometimes|nullable|' . it()->image(),
			'system_status' => '',
			'system_message' => '',
		];


		$data = $this->validate(request(), $rules, [], [
			'sitename_ar' => trans('admin.sitename_ar'),
			'sitename_en' => trans('admin.sitename_en'),
			'sitename_fr' => trans('admin.sitename_fr'),
			'email' => trans('admin.email'),
			'logo' => trans('admin.logo'),
			'icon' => trans('admin.icon'),
			'system_status' => trans('admin.system_status'),
			'system_message' => trans('admin.system_message'),
		]);
		if (request()->hasFile('logo')) {
            $data['logo'] =  self::uploadImage($request->logo,'logo');
			//$data['logo'] = it()->upload('logo', 'setting');
		}
		if (request()->hasFile('icon')) {
            $data['icon'] =  self::uploadImage($request->icon,'icon');
			//$data['icon'] = it()->upload('icon', 'setting');
		}
		Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated'));
		return redirect(aurl('settings'));

	}

    function uploadImage($image , $fileName)
    {
        $imageName =  time().'.'. $image->extension();
        $imageToSave = $fileName . DIRECTORY_SEPARATOR . time().'.'. $image->extension();

        $image->move(public_path('storage'. DIRECTORY_SEPARATOR .$fileName), $imageName);
        return $imageToSave;
    }

}
