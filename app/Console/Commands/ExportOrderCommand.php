<?php

namespace App\Console\Commands;

use App\Exports\OrdersExport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\OrderService;
use Carbon\Carbon;
use Symfony\Component\Console\Output\ConsoleOutput;

class ExportOrderCommand extends Command
{
    public $orderService;
    public $output;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
        $this->output = new ConsoleOutput();
        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pomen:export-order  {--date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export order from date to excel file ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date =  "";

        try {
            $date = Carbon::parse($this->option('date'));
        } catch (\Throwable $th) {
            $this->output->error($th);
        }
        $this->output->info($date);

        $data = [];
        if (empty($date)) $data = $this->orderService->getAllFrom($date);
        else $data = $this->orderService->getAll();

        $filename = 'orders-' . $date->format('Y-m-d') . ".xlsx";
        Excel::download(new OrdersExport($data), $filename);
        $this->output->success("order successfully export");
        return 0;
    }
}
