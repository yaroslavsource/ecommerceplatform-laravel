<?php
/**
 * This file auto install s-cart, using for S-cart from version 2.1.1
 * @author Naruto <lanhktc@gmail.com>
 */

require __DIR__ . '/../vendor/autoload.php';
$app      = require_once __DIR__ . '/../bootstrap/app.php';
$kernel   = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$lang = request('lang') ?? 'en';
app()->setlocale($lang);
if (request()->method() == 'POST' && request()->ajax()) {

    $step = request('step');
    switch ($step) {
        case 'step1':
            $domain            = request()->getSchemeAndHttpHost();
            $database_host     = request('database_host') ?? '127.0.0.1';
            $database_port     = request('database_port') ?? '3306';
            $database_name     = request('database_name') ?? '';
            $database_user     = request('database_user') ?? '';
            $database_password = request('database_password') ?? '';
            $admin_url         = request('admin_url') ?? '';
            try {
                $getEnv = file_get_contents(base_path() . '/.env.example');
                $getEnv = str_replace('your_domain', $domain, $getEnv);
                $getEnv = str_replace('database_host', $database_host, $getEnv);
                $getEnv = str_replace('database_port', $database_port, $getEnv);
                $getEnv = str_replace('database_name', $database_name, $getEnv);
                $getEnv = str_replace('database_user', $database_user, $getEnv);
                $getEnv = str_replace('database_password', $database_password, $getEnv);
                if ($admin_url) {
                    $getEnv = str_replace('system_admin', $admin_url, $getEnv);
                }
                $env = fopen(base_path() . "/.env", "w") or die(json_encode(['error' => 1, 'msg' => trans('install.env.error_open')]));
                fwrite($env, $getEnv);
                fclose($env);
                exec('php ../artisan config:clear');
                exec('php ../artisan cache:clear');
            } catch (\Exception $e) {
                echo json_encode(['error' => 1, 'msg' => $e->getMessage()]);
                exit();
            }
            echo json_encode(['error' => 0, 'msg' => trans('install.env.process_sucess')]);
            break;

        case 'step2':
            try {
                shell_exec('php ../artisan key:generate');
            } catch (\Exception $e) {
                echo json_encode(['error' => 1, 'msg' => $e->getMessage()]);
                exit;
            }
            echo json_encode(['error' => 0, 'msg' => trans('install.key.process_sucess')]);
            break;

        case 'step3':
            try {
                shell_exec('php ../artisan migrate');

            } catch (\Exception $e) {
                echo json_encode(['error' => 1, 'msg' => explode("\n", $e->getMessage())[0]]);
                exit();
            }
            echo json_encode(['error' => 0, 'msg' => trans('install.database.process_sucess')]);
            break;

        case 'step4':
            try {
                foldes_permissions();
                try {
                    rename(base_path() . '/public/install.php', base_path() . '/public/install.scart');
                } catch (\Exception $e) {
                    echo json_encode(['error' => 1, 'msg' => trans('install.rename_error')]);
                    exit();
                }

            } catch (\Exception $e) {
                echo json_encode(['error' => 1, 'msg' => $e->getMessage()]);
                exit();

            }

            exec('php ../artisan config:cache');
            echo json_encode(['error' => 0, 'msg' => trans('install.permission.process_sucess')]);
            break;

        default:
            # code...
            break;
    }
} else {
    echo view('install', array(
        'path_lang' => (($lang != 'en') ? "?lang=" . $lang : ""),
        'title'     => trans('install.title'))
    );
    exit();
}

function foldes_permissions()
{
    $foldes = array(
        base_path() . '/storage/',
        base_path() . '/vendor/',
        base_path() . '/public/documents/',
    );
    exec('chmod o+w -R ' . implode(' ', $foldes));
}
