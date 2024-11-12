 Part of PHP Collective
0

I have a problem with editing user information. I want the password column to remain unchanged when no input is entered in the password field. Currently, when, for example, I only change the email, the password field is sent empty, and that empty field is saved as a hashed value in the password column. Is there a way to solve this problem? Case 1: If possible, I don't want the password change to be separate from the other information, and I want all of these to work correctly in one form tag. Case 2: The password should not be changed by taking the current password because the admin does not have access to the user's password.

The codes are as follows:
Blade Template:

<form id="userFRM" action="{{ isset($user->id) ? route('user.update') : route('auth.register') }}" method="post">
    @csrf

    @if (session('error_message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check2 me-1"></i> {{ session('error_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    @if (isset($user->id))
        <input id="user_id" name="user_id" type="hidden" value="{{ $user->id }}">
    @endif

    <div class="mb-2 row">
        <div class="form-floating mb-2 col-4">
            <input type="text" name="username" class="form-control" id="username"
                value="{{ isset($user->id) ? $user->username : old('username') }}" placeholder="Username" />
            <label for="username">{{ trans('admin.username') }}</label>
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
        <div class="form-floating mb-2 col-4">
            <input type="text" name="first_name" class="form-control" id="firs_tname"
                value="{{ isset($user->id) ? $user->first_name : old('first_name') }}" placeholder="First Name" />
            <label for="firs_tname">{{ trans('auth.first_name') }}</label>

        </div>
        <div class="form-floating mb-2 col-4">
            <input type="text" name="last_name" class="form-control" id="last_name"
                value="{{ isset($user->id) ? $user->last_name : old('last_name') }}" placeholder="Last Name" />
            <label for="last_name">{{ trans('auth.last_name') }}</label>

        </div>
    </div>
    <div class="mb-2 row">
        <div class="form-floating mb-2 col-4">

            <input type="email" name="email" class="form-control" id="email"
                value="{{ isset($user->id) ? $user->email : old('email') }}" placeholder="email" />
            <label for="email">{{ trans('auth.email') }}</label>

            <x-input-error :messages="$errors->get('email')" class="mt-2" />

        </div>

        <div class="form-floating mb-2 col-4">

            <input type="password" name="password" class="form-control" id="password" placeholder="password" />
            <label for="password">{{ trans('auth.password') }}</label>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>

        <div class="form-floating mb-2 col-4">
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                placeholder="password_confirmation" />
            <label for="password_confirmation">{{ trans('auth.confirm_password') }}</label>

        </div>
    </div>
    <div class="mb-2 row">
        <div class="form-floating mb-2 col-4">

            <select name="role" class="form-select " id="role">
                @foreach ($roles as $role)
                    @if (isset($user->id))
                        <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>
                            {{ $role->title }}</option>
                    @else
                        <option value="{{ $role->id }}">{{ $role->title }}</option>
                    @endif
                @endforeach
            </select>
            <label for="role">{{ trans('auth.user_role') }}</label>

        </div>
        <div class="my-5 col-4">

            @if (isset($user->id))
                <input type="checkbox" name="is_admin" class="form-check-input" id="is_admin"
                    {{ $user->is_admin == true ? 'checked' : '' }} />
                <label for="is_admin" class="form-check-label">{{ trans('auth.is_admin') }}</label>
                <input type="checkbox" class="form-check-input ms-5" name="verify_email" id="verify_email"
                    {{ isset($user->email_verified_at) ? 'checked' : '' }} />
                <label for="verify_email" class="form-check-label">{{ trans('auth.verify_email') }}</label>
            @else
                <input type="checkbox" name="is_admin" class="form-check-input" id="is_admin" />
                <label for="is_admin" class="form-check-label">{{ trans('auth.is_admin') }}</label>
                <input type="checkbox" class="form-check-input ms-5" name="verify_email" id="verify_email" />
                <label for="verify_email" class="form-check-label">{{ trans('auth.verify_email') }}</label>
            @endif


        </div>
        <div class="my-5">


            @if (isset($user->id))

                @if (\App\Helper\ClaimsHelper::hasAccess(\App\Helper\ClaimsHelper::EDIT))
                    <x-primary-button>
                        {{ trans('users.edit') }}
                    </x-primary-button>
                @endif
            @else
                @if (\App\Helper\ClaimsHelper::hasAccess(\App\Helper\ClaimsHelper::ADD))
                    <x-primary-button>
                        {{ trans('auth.sign_up') }}
                    </x-primary-button>
                @endif

            @endif
        </div>
</form>

