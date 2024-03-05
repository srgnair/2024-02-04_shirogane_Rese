<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reserve;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderMail;
use Illuminate\Support\Facades\Log;

class sendReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendReminderEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'リマインダーを送信する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $today = now()->startOfDay();

        // $reserves = Reserve::whereDate('reserved_date', $today)->get();

        // foreach ($reserves as $reserve) {
        //     $user = $reserve->user;
        //     Mail::to($user->email)->send(new ReminderMail($reserve));
        // }

        // $this->info('リマインダーメールを送信しました');
        // return Command::SUCCESS;

        $reserves = Reserve::all();

        foreach ($reserves as $reserve) {
            $user = $reserve->user;
            Mail::to($user->email)->send(new ReminderMail($reserve));
        }

        $this->info('リマインダーメールを送信しました');

        try {
            Log::debug('バッチ成功');
        } catch (\Exception $e) {
            Log::error('バッチ処理中にエラーが発生しました: ' . $e->getMessage());
        }

        return Command::SUCCESS;
    }
}
