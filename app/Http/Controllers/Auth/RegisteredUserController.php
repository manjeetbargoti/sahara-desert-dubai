<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\User;
use App\Models\Seller;
use App\Models\Shop;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
                'phone' => ['required']
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'user_type' => $request->user_type,
                'role_id' => roleIdByType($request->user_type),
                'phone_country_code' => $request->country_code,
                'phone' => $request->phone,
                'referrel_code' => referrel_code(8),
                'password' => Hash::make($request->password),
                'ban' => 0,
                'status' => 1,
                'sdd_points' => 0,
                'balance' => 0
            ]);
    
            $seller = new Seller();
            $seller->user_id = $user->id;
            $seller->type = $request->user_type;
            $seller->verification_status = 1;
            $seller->balance = 0;
            $seller->save();

            $shop = new Shop();
            $shop->name = $request->shop_name;
            $shop->slug = Str::slug($request->shop_name);
            $shop->user_id = $user->id;
            $shop->save();

            DB::commit();

            // Send Confirmation Email to Customer
            $mail_info = Mail::to($request->email)->send(new WelcomeEmail($user));
            
            event(new Registered($user));
    
            Auth::login($user);
    
            return redirect(route('dashboard', absolute: false));
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
