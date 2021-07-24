<?php

namespace App\Observers;

use App\Mail\LogMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Log;

class LogObserver
{
    /**
     * Handle the Log "created" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function created(Log $log)
    {
        $creator = $log->task->creator;

        if($creator->id != auth()->user()->id)
        {
            $task = $log->task;
            $msg = 'Hay nuevos Logs en la tarea ' . $task->title;

            Mail::to($creator->email)->send(new LogMail($msg));
        }
    }

    /**
     * Handle the Log "updated" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function updated(Log $log)
    {
        //
    }

    /**
     * Handle the Log "deleted" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function deleted(Log $log)
    {
        //
    }

    /**
     * Handle the Log "restored" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function restored(Log $log)
    {
        //
    }

    /**
     * Handle the Log "force deleted" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function forceDeleted(Log $log)
    {
        //
    }
}
