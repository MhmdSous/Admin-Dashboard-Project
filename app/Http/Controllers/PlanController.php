<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Plan;
use GuzzleHttp\Promise\Create;
use Laravel\Cashier\Billable;
use Stripe\Plan as StripePlan;

class PlanController extends Controller
{


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {

         $plans = Plan::get();

        return view("payment.plans", compact("plans"));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show(Plan $plan, Request $request)
    {


        // ->createSetupIntent()
        $intent= auth()->user();
    //   $intent=  $this->createSetupIntent();


        return view("payment.subscription", compact("plan", "intent"));
    }
    // protected function createSetupIntent(array $options = [])
    //     {
    //         return $this->stripe()->setupIntents->create($options);
    //     }
    /**
     * Write code on Method
     *
     * @return response()
     */


    public function subscription(Request $request)
    {


        $plan = Plan::find($request->plan);

        // $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
        //                 ->create($request->token);

        return view("payment.subscription_success");
    }

}
