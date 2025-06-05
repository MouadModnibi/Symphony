<?php

// app/Http/Controllers/PremiumController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payement;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PremiumController extends Controller
{
    public function showPlans()
    {
        return view('premium');
    }

    public function pay(Request $request, $plan)
    {
        // Validate the plan
        if (!in_array($plan, ['premium', 'family'])) {
            return redirect()->route('premium')->with('error', 'Invalid plan selected');
        }

        $user = $request->user();
        
        // Check if user already has an active subscription
        if ($user->activeSubscription && $user->activeSubscription->isActive()) {
            return redirect()->route('premium')->with('info', 'You already have an active subscription');
        }

        // In the pay() method:
return view('payement.payement', [ // Changed from 'payement' to 'payement.payement'
    'plan' => $plan,
    'price' => $this->getPlanPrice($plan),
    'user' => $user
]);

// In the success() method:
return view('payement.success'); // Changed from 'payement-success' to 'payement.success'
    }

    public function processpayement(Request $request)
    {
        $request->validate([
            'plan' => 'required|in:premium,family',
            'x  t_method' => 'required|string'
        ]);

        $user = $request->user();
        $plan = $request->plan;
        $price = $this->getPlanPrice($plan);

        // In a real app, you would integrate with a payement gateway here
        // For demo purposes, we'll simulate a successful payement

        try {
            // Create payement record
            $payement = payement::create([
                'user_id' => $user->id,
                'payement_id' => 'simulated_' . uniqid(),
                'plan' => $plan,
                'amount' => $price,
                'status' => 'completed',
                'payement_details' => [
                    'method' => 'simulated',
                    'last_four' => '4242',
                    'brand' => 'visa'
                ]
            ]);

            // Create or update subscription
            $trialEndsAt = $user->isOnTrial() ? $user->trial_ends_at : null;
            
            if (!$trialEndsAt) {
                $trialEndsAt = now()->addDays(7); // 7-day trial
            }

            $subscription = Subscription::updateOrCreate(
                ['user_id' => $user->id, 'status' => 'active'],
                [
                    'plan' => $plan,
                    'status' => 'trialing',
                    'trial_ends_at' => $trialEndsAt,
                    'ends_at' => null
                ]
            );

            // Update user
            $user->update([
                'plan' => $plan,
                'trial_ends_at' => $trialEndsAt,
                'is_premium' => true
            ]);

            return redirect()->route('premium.success')->with('success', 'Subscription activated successfully!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'payement failed: ' . $e->getMessage());
        }
    }

    public function success()
    {
        return view('payement-success');
    }

    public function cancel(Request $request)
    {
        $user = $request->user();
        
        if ($user->activeSubscription) {
            $user->activeSubscription->update([
                'status' => 'canceled',
                'ends_at' => now()
            ]);
            
            $user->update(['is_premium' => false]);
            
            return redirect()->route('premium')->with('success', 'Subscription canceled successfully');
        }
        
        return redirect()->route('premium')->with('error', 'No active subscription found');
    }

    private function getPlanPrice($plan)
    {
        return [
            'premium' => 9.99,
            'family' => 14.99
        ][$plan];
    }

    
}
