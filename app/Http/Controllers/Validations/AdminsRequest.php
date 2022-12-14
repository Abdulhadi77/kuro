<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class AdminsRequest extends FormRequest {

	
	public function authorize() {
		return true;
	}

	
	protected function onCreate() {
		return [
			'name' => 'required|string',
			'password' => 'required|max:255|min:6',
			'photo_profile' => '' . it()->image() . '|nullable|sometimes',
			'email' => 'required|email|unique:admins',
			'group_id' => 'required|numeric|exists:admin_groups,id',
		];
	}

	protected function onUpdate() {
		return [
			'name' => 'required|string',
			'password' => 'sometimes|nullable|max:255|min:6',
			'photo_profile' => '' . it()->image() . '|nullable|sometimes',
			'email' => 'required|email|unique:admins,email,' . request()->segment(3),
			'group_id' => 'required|numeric|exists:admin_groups,id',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}

	
	public function attributes() {
		return [
			'name' => trans('admin.name'),
			'password' => trans('admin.password'),
			'photo_profile' => trans('admin.photo_profile'),
			'email' => trans('admin.email'),
			'group_id' => trans('admin.group_id'),
		];
	}

	
	public function response(array $errors) {
		return $this->ajax() || $this->wantsJson() ?
		response([
			'status' => false,
			'StatusCode' => 422,
			'StatusType' => 'Unprocessable',
			'errors' => $errors,
		], 422) :
		back()->withErrors($errors)->withInput(); // Redirect back
	}

}