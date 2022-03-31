<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\UserService;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class ExportUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pomen:export-user {--extension=}';

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
        $extension = $this->option('extension');
        $filename = 'users' . "." . $extension;

        $data = $this->userService->getAll();

        if ($extension == 'xlsx') {
            Excel::download(new UsersExport($data->toArray()), $filename);
        } else {
            $text = "";
            foreach ($data as $key => $row) {
                $text .= $row["name"] . " ( " . $row["id"] . " )\n";
            }
            Storage::disk('public')->put($filename, $text);
        }
        $this->output->success("user successfully export");
        return 0;
    }
}
