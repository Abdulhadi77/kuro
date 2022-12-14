<?php
namespace App\Http\Controllers\ValidationsApi\V1\Auth;

use Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class ChangePasswordRequest extends FormRequest {
	private function auth() {
		return auth()->guard('api');
	}
	
	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'current_password' => [
				'required', function ($attribute, $value, $fail) {
					if (!Hash::check($value, $this->auth()->user()->password)) {
						$fail('Your password was not updated, since the provided current password does not match.');
					}
				},
			],
			'new_password' => [
				'required',
				'different:current_password',
				'string', Password::min(6)->mixedCase()->numbers()
					->symbols()->uncompromised(),
			],
			'password_confirmation' => [
				'required',
				'same:new_password',
				'string', Password::min(6)->mixedCase()->numbers()
					->symbols()->uncompromised(),
			],
		];
	}

	
	public function attributes() {
		return [
			'current_password' => trans('main.current_password'),
			'new_password' => trans('main.new_password'),
			'password_confirmation' => trans('main.password_confirmation'),
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