<?php

namespace App\Console\Commands;


use App\Mail\SendICOMail;
use App\Models\ICO;
use App\Models\IcoUser;
use App\Models\User;
use Carbon\Carbon;

use Carbon\Traits\Creator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SubscriptionProvider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:provider';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $subscriptions=ICO::where('status','will_open')->get();
        foreach ($subscriptions as $subscription)
        {

            $user=User::where('id',$subscription->user_id)->first();

            $timestamp = strtotime($subscription->open_date);
            $day = date('d', $timestamp);
            $month = date('m', $timestamp);
            $year = new Carbon( $subscription->open_date );
            $date_now = strtotime(Carbon::now());
            $day_now = date('d', $date_now);
            $month_now = date('m', $date_now);
            $year_now = Carbon::now()->format('Y');


            $startDate = Carbon::createFromFormat('Y-m-d H:i:s',  $subscription->open_date);
            $endDate = Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s', strtotime(Carbon::now())));
            $days = $startDate->diffInDays($endDate);
            $hours = $startDate->copy()->addDays($days)->diffInHours($endDate);
            $minutes = $startDate->copy()->addDays($days)->addHours($hours)->diffInMinutes($endDate);

            if($day==$day_now && $month==$month_now && $year->year == $year_now && $minutes ==0)
            {
                $subscription->status='opened';
                $subscription->save();
                $details = [
                    'title' => 'Mail from kuro website',
                    'body' =>$subscription->type ,
                ];

                Mail::to($user->email)->send(new SendICOMail($details));
            }
        }
    }
}
