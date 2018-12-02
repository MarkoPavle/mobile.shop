[33mcommit b8f66582e7fc7eb3c0e1d153a5a9e627f243ee1a[m[33m ([m[1;36mHEAD -> [m[1;32mmaster[m[33m)[m
Author: MarkoPavle <markopavle@gmail.com>
Date:   Mon Dec 3 00:00:39 2018 +0100

    first commit

[1mdiff --git a/.editorconfig b/.editorconfig[m
[1mnew file mode 100644[m
[1mindex 0000000..6f313c6[m
[1m--- /dev/null[m
[1m+++ b/.editorconfig[m
[36m@@ -0,0 +1,15 @@[m
[32m+[m[32mroot = true[m
[32m+[m
[32m+[m[32m[*][m
[32m+[m[32mcharset = utf-8[m
[32m+[m[32mend_of_line = lf[m
[32m+[m[32minsert_final_newline = true[m
[32m+[m[32mindent_style = space[m
[32m+[m[32mindent_size = 4[m
[32m+[m[32mtrim_trailing_whitespace = true[m
[32m+[m
[32m+[m[32m[*.md][m
[32m+[m[32mtrim_trailing_whitespace = false[m
[32m+[m
[32m+[m[32m[*.yml][m
[32m+[m[32mindent_size = 2[m
[1mdiff --git a/.env.example b/.env.example[m
[1mnew file mode 100644[m
[1mindex 0000000..27f6db4[m
[1m--- /dev/null[m
[1m+++ b/.env.example[m
[36m@@ -0,0 +1,39 @@[m
[32m+[m[32mAPP_NAME=Laravel[m
[32m+[m[32mAPP_ENV=local[m
[32m+[m[32mAPP_KEY=[m
[32m+[m[32mAPP_DEBUG=true[m
[32m+[m[32mAPP_URL=http://localhost[m
[32m+[m
[32m+[m[32mLOG_CHANNEL=stack[m
[32m+[m
[32m+[m[32mDB_CONNECTION=mysql[m
[32m+[m[32mDB_HOST=127.0.0.1[m
[32m+[m[32mDB_PORT=3306[m
[32m+[m[32mDB_DATABASE=homestead[m
[32m+[m[32mDB_USERNAME=homestead[m
[32m+[m[32mDB_PASSWORD=secret[m
[32m+[m
[32m+[m[32mBROADCAST_DRIVER=log[m
[32m+[m[32mCACHE_DRIVER=file[m
[32m+[m[32mQUEUE_CONNECTION=sync[m
[32m+[m[32mSESSION_DRIVER=file[m
[32m+[m[32mSESSION_LIFETIME=120[m
[32m+[m
[32m+[m[32mREDIS_HOST=127.0.0.1[m
[32m+[m[32mREDIS_PASSWORD=null[m
[32m+[m[32mREDIS_PORT=6379[m
[32m+[m
[32m+[m[32mMAIL_DRIVER=smtp[m
[32m+[m[32mMAIL_HOST=smtp.mailtrap.io[m
[32m+[m[32mMAIL_PORT=2525[m
[32m+[m[32mMAIL_USERNAME=null[m
[32m+[m[32mMAIL_PASSWORD=null[m
[32m+[m[32mMAIL_ENCRYPTION=null[m
[32m+[m
[32m+[m[32mPUSHER_APP_ID=[m
[32m+[m[32mPUSHER_APP_KEY=[m
[32m+[m[32mPUSHER_APP_SECRET=[m
[32m+[m[32mPUSHER_APP_CLUSTER=mt1[m
[32m+[m
[32m+[m[32mMIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"[m
[32m+[m[32mMIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"[m
[1mdiff --git a/.gitattributes b/.gitattributes[m
[1mnew file mode 100644[m
[1mindex 0000000..967315d[m
[1m--- /dev/null[m
[1m+++ b/.gitattributes[m
[36m@@ -0,0 +1,5 @@[m
[32m+[m[32m* text=auto[m
[32m+[m[32m*.css linguist-vendored[m
[32m+[m[32m*.scss linguist-vendored[m
[32m+[m[32m*.js linguist-vendored[m
[32m+[m[32mCHANGELOG.md export-ignore[m
[1mdiff --git a/.gitignore b/.gitignore[m
[1mnew file mode 100644[m
[1mindex 0000000..169c5ee[m
[1m--- /dev/null[m
[1m+++ b/.gitignore[m
[36m@@ -0,0 +1,15 @@[m
[32m+[m[32m/node_modules[m
[32m+[m[32m/public/hot[m
[32m+[m[32m/public/storage[m
[32m+[m[32m/storage/*.key[m
[32m+[m[32m/vendor[m
[32m+[m[32m/.idea[m
[32m+[m[32m/.vscode[m
[32m+[m[32m/nbproject[m
[32m+[m[32m/.vagrant[m
[32m+[m[32mHomestead.json[m
[32m+[m[32mHomestead.yaml[m
[32m+[m[32mnpm-debug.log[m
[32m+[m[32myarn-error.log[m
[32m+[m[32m.env[m
[32m+[m[32m.phpunit.result.cache[m
[1mdiff --git a/app/Brand.php b/app/Brand.php[m
[1mnew file mode 100644[m
[1mindex 0000000..dbff986[m
[1m--- /dev/null[m
[1m+++ b/app/Brand.php[m
[36m@@ -0,0 +1,10 @@[m
[32m+[m[32m<?php[m
[32m+[m
[32m+[m[32mnamespace App;[m
[32m+[m
[32m+[m[32muse Illuminate\Database\Eloquent\Model;[m
[32m+[m
[32m+[m[32mclass Brand extends Model[m
[32m+[m[32m{[m
[32m+[m[32m    //[m
[32m+[m[32m}[m
[1mdiff --git a/app/Console/Kernel.php b/app/Console/Kernel.php[m
[1mnew file mode 100644[m
[1mindex 0000000..a8c5158[m
[1m--- /dev/null[m
[1m+++ b/app/Console/Kernel.php[m
[36m@@ -0,0 +1,42 @@[m
[32m+[m[32m<?php[m
[32m+[m
[32m+[m[32mnamespace App\Console;[m
[32m+[m
[32m+[m[32muse Illuminate\Console\Scheduling\Schedule;[m
[32m+[m[32muse Illuminate\Foundation\Console\Kernel as ConsoleKernel;[m
[32m+[m
[32m+[m[32mclass Kernel extends ConsoleKernel[m
[32m+[m[32m{[m
[32m+[m[32m    /**[m
[32m+[m[32m     * The Artisan commands provided by your application.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @var array[m
[32m+[m[32m     */[m
[32m+[m[32m    protected $commands = [[m
[32m+[m[32m        //[m
[32m+[m[32m    ];[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Define the application's command schedule.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule[m
[32m+[m[32m     * @return void[m
[32m+[m[32m     */[m
[32m+[m[32m    protected function schedule(Schedule $schedule)[m
[32m+[m[32m    {[m
[32m+[m[32m        // $schedule->command('inspire')[m
[32m+[m[32m        //          ->hourly();[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Register the commands for the application.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @return void[m
[32m+[m[32m     */[m
[32m+[m[32m    protected function commands()[m
[32m+[m[32m    {[m
[32m+[m[32m        $this->load(__DIR__.'/Commands');[m
[32m+[m
[32m+[m[32m        require base_path('routes/console.php');[m
[32m+[m[32m    }[m
[32m+[m[32m}[m
[1mdiff --git a/app/Exceptions/Handler.php b/app/Exceptions/Handler.php[m
[1mnew file mode 100644[m
[1mindex 0000000..043cad6[m
[1m--- /dev/null[m
[1m+++ b/app/Exceptions/Handler.php[m
[36m@@ -0,0 +1,51 @@[m
[32m+[m[32m<?php[m
[32m+[m
[32m+[m[32mnamespace App\Exceptions;[m
[32m+[m
[32m+[m[32muse Exception;[m
[32m+[m[32muse Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;[m
[32m+[m
[32m+[m[32mclass Handler extends ExceptionHandler[m
[32m+[m[32m{[m
[32m+[m[32m    /**[m
[32m+[m[32m     * A list of the exception types that are not reported.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @var array[m
[32m+[m[32m     */[m
[32m+[m[32m    protected $dontReport = [[m
[32m+[m[32m        //[m
[32m+[m[32m    ];[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * A list of the inputs that are never flashed for validation exceptions.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @var array[m
[32m+[m[32m     */[m
[32m+[m[32m    protected $dontFlash = [[m
[32m+[m[32m        'password',[m
[32m+[m[32m        'password_confirmation',[m
[32m+[m[32m    ];[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Report or log an exception.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @param  \Exception  $exception[m
[32m+[m[32m     * @return void[m
[32m+[m[32m     */[m
[32m+[m[32m    public function report(Exception $exception)[m
[32m+[m[32m    {[m
[32m+[m[32m        parent::report($exception);[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Render an exception into an HTTP response.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @param  \Illuminate\Http\Request  $request[m
[32m+[m[32m     * @param  \Exception  $exception[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function render($request, Exception $exception)[m
[32m+[m[32m    {[m
[32m+[m[32m        return parent::render($request, $exception);[m
[32m+[m[32m    }[m
[32m+[m[32m}[m
[1mdiff --git a/app/Http/Controllers/Auth/ForgotPasswordController.php b/app/Http/Controllers/Auth/ForgotPasswordController.php[m
[1mnew file mode 100644[m
[1mindex 0000000..6a247fe[m
[1m--- /dev/null[m
[1m+++ b/app/Http/Controllers/Auth/ForgotPasswordController.php[m
[36m@@ -0,0 +1,32 @@[m
[32m+[m[32m<?php[m
[32m+[m
[32m+[m[32mnamespace App\Http\Controllers\Auth;[m
[32m+[m
[32m+[m[32muse App\Http\Controllers\Controller;[m
[32m+[m[32muse Illuminate\Foundation\Auth\SendsPasswordResetEmails;[m
[32m+[m
[32m+[m[32mclass ForgotPasswordController extends Controller[m
[32m+[m[32m{[m
[32m+[m[32m    /*[m
[32m+[m[32m    |----------