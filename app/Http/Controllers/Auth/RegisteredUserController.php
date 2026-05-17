<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name'   => ['required', 'string', 'max:100'],
            'last_name'    => ['nullable', 'string', 'max:100'],
            'company'      => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password'     => ['required', 'confirmed', Rules\Password::defaults()],
            'plan'         => ['nullable', 'in:starter,professional,enterprise'],
        ]);

        $user = DB::transaction(function () use ($request) {
            // Create tenant (company)
            $tenantId = Str::slug($request->company) . '-' . Str::random(6);
            $plan     = $request->plan ?? 'starter';
            $limits   = ['starter' => 10, 'professional' => 100, 'enterprise' => 500];
            $limitGB  = $limits[$plan] * 1024 * 1024 * 1024;

            $tenant = Tenant::create([
                'id'           => $tenantId,
                'company_name' => $request->company,
                'plan'         => $plan,
                'storage_limit' => $limitGB,
            ]);

            // Create the first user as super_admin of this tenant
            $user = User::create([
                'tenant_id' => $tenant->id,
                'name'      => trim($request->first_name . ' ' . $request->last_name),
                'email'     => $request->email,
                'password'  => $request->password, // cast hashes automatically
            ]);

            $user->assignRole('super_admin');

            return $user;
        });

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
