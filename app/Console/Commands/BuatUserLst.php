<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Hash;

class BuatUserLst extends Command
{
    public $username;
    public $password;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user_lst:add {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command untuk membuat user lst';

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
     * @return mixed
     */
    public function handle()
    {
        $username = $this->argument('username');
        $password = $this->argument('password');

        $model = new User();
        $model->name = $username;
        $model->password = Hash::make($password);
        $model->level = 1;
        if ($model->save()) {
            $this->info('User berhasil ditambahkan');
        }
    }
}
