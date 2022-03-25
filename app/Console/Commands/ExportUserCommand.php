<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\UserService;
use Illuminate\Support\Facades\Storage;

class ExportUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pomen:export-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export user data to txt';

    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = $this->userService->getAll();
        $filename = "export-user.txt";
        $text = "";
        foreach ($data as $key => $row) {
            $text .= $row["name"] . " ( " . $row["id"] . " )\n";
        }
        Storage::disk('local')->put($filename, $text);
        echo "user successfully export";
        return 0;
    }
}
