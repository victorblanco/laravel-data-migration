<?php
namespace VictorBlanco\DBtoMigration;

use Encore\Admin\Auth\Database\Menu;
use Illuminate\Console\Command;
use Storage;
use View;


class DBtoMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'helpers:data-migration {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * @throws \Throwable
     */
    public function handle()
    {
       $_model  = $this->argument('model');
       $model   = new $_model;

       $table   = $model->getTable();
       $data    = $model->all();

        $this->saveFile('dbtomigration::migration'
            , $this->getFileName($table)
            , compact('data', 'table'));

    }

    /**
     * @param $template
     * @param $file
     * @param $data
     * @throws \Throwable
     */
    protected function saveFile ($template, $file, $data)
    {
        $view = view($template, $data);

        file_put_contents($file, $view->render());
    }

    /**
     * @param $table
     * @return string
     */
    protected function getFileName($table)
    {
        return config('dbtomigration.folder_migration') . '/' . date('Y_m_d_his_') . $table . '_data_migration.php';
    }
}

