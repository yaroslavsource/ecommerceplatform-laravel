<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function getConnection()
    {
        return config('admin.database.connection') ?: config('database.default');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('admin.database.users_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 190)->unique();
            $table->string('password', 60);
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });

        Schema::create(config('admin.database.roles_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('slug', 50)->unique();
            $table->timestamps();
        });

        Schema::create(config('admin.database.permissions_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('slug', 50)->unique();
            $table->string('http_method')->nullable();
            $table->text('http_path')->nullable();
            $table->timestamps();
        });

        Schema::create(config('admin.database.menu_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->integer('order')->default(0);
            $table->string('title', 50);
            $table->string('icon', 50);
            $table->string('uri', 50)->nullable();
            $table->string('permission')->nullable();

            $table->timestamps();
        });

        Schema::create(config('admin.database.role_users_table'), function (Blueprint $table) {
            $table->integer('role_id');
            $table->integer('user_id');
            $table->index(['role_id', 'user_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.role_permissions_table'), function (Blueprint $table) {
            $table->integer('role_id');
            $table->integer('permission_id');
            $table->index(['role_id', 'permission_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.user_permissions_table'), function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('permission_id');
            $table->index(['user_id', 'permission_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.role_menu_table'), function (Blueprint $table) {
            $table->integer('role_id');
            $table->integer('menu_id');
            $table->index(['role_id', 'menu_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.operation_log_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('path');
            $table->string('method', 10);
            $table->string('ip');
            $table->text('input');
            $table->index('user_id');
            $table->timestamps();
        });
        $this->importData();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('admin.database.users_table'));
        Schema::dropIfExists(config('admin.database.roles_table'));
        Schema::dropIfExists(config('admin.database.permissions_table'));
        Schema::dropIfExists(config('admin.database.menu_table'));
        Schema::dropIfExists(config('admin.database.user_permissions_table'));
        Schema::dropIfExists(config('admin.database.role_users_table'));
        Schema::dropIfExists(config('admin.database.role_permissions_table'));
        Schema::dropIfExists(config('admin.database.role_menu_table'));
        Schema::dropIfExists(config('admin.database.operation_log_table'));
    }

    public function importData()
    {
        DB::table(config('admin.database.menu_table'))->insert([
            ['id' => '1', 'parent_id' => '0', 'order' => 1, 'title' => 'Index', 'icon' => 'fa-bar-chart', 'uri' => '/'],
            ['id' => '2', 'parent_id' => '0', 'order' => 2, 'title' => 'admin', 'icon' => 'fa-tasks', 'uri' => ''],
            ['id' => '3', 'parent_id' => '2', 'order' => 3, 'title' => 'users', 'icon' => 'fa-users', 'uri' => 'auth/users'],
            ['id' => '4', 'parent_id' => '2', 'order' => 4, 'title' => 'roles', 'icon' => 'fa-user', 'uri' => 'auth/roles'],
            ['id' => '5', 'parent_id' => '2', 'order' => 5, 'title' => 'permission', 'icon' => 'fa-ban', 'uri' => 'auth/permissions'],
            ['id' => '6', 'parent_id' => '2', 'order' => 6, 'title' => 'menu', 'icon' => 'fa-bars', 'uri' => 'auth/menu'],
            ['id' => '7', 'parent_id' => '2', 'order' => 7, 'title' => 'operation_log', 'icon' => 'fa-history', 'uri' => 'auth/logs'],
            ['id' => '8', 'parent_id' => '31', 'order' => 23, 'title' => 'customer_manager', 'icon' => 'fa-user-md', 'uri' => 'shop_customer'],
            ['id' => '9', 'parent_id' => '25', 'order' => 18, 'title' => 'orders_manager', 'icon' => 'fa-shopping-cart', 'uri' => 'shop_order'],
            ['id' => '10', 'parent_id' => '15', 'order' => 11, 'title' => 'all_products', 'icon' => 'fa-file-photo-o', 'uri' => 'shop_product'],
            ['id' => '11', 'parent_id' => '15', 'order' => 13, 'title' => 'brands', 'icon' => 'fa-bank', 'uri' => 'shop_brand'],
            ['id' => '13', 'parent_id' => '15', 'order' => 10, 'title' => 'categories', 'icon' => 'fa-folder-open-o', 'uri' => 'shop_category'],
            ['id' => '14', 'parent_id' => '15', 'order' => 12, 'title' => 'special_price', 'icon' => 'fa-paw', 'uri' => 'special_price'],
            ['id' => '15', 'parent_id' => '0', 'order' => 9, 'title' => 'product_mamager', 'icon' => 'fa-folder-open', 'uri' => ''],
            ['id' => '18', 'parent_id' => '23', 'order' => 43, 'title' => 'config_info', 'icon' => 'fa-cog', 'uri' => 'config_info'],
            ['id' => '22', 'parent_id' => '0', 'order' => 8, 'title' => 'pages', 'icon' => 'fa-clone', 'uri' => 'shop_page'],
            ['id' => '23', 'parent_id' => '0', 'order' => 42, 'title' => 'settings', 'icon' => 'fa-cogs', 'uri' => ''],
            ['id' => '24', 'parent_id' => '62', 'order' => 38, 'title' => 'banners_manager', 'icon' => 'fa-simplybuilt', 'uri' => 'banner'],
            ['id' => '25', 'parent_id' => '0', 'order' => 17, 'title' => 'order_manager', 'icon' => 'fa-cart-arrow-down', 'uri' => ''],
            ['id' => '26', 'parent_id' => '25', 'order' => 19, 'title' => 'order_status', 'icon' => 'fa-asterisk', 'uri' => 'shop_order_status'],
            ['id' => '27', 'parent_id' => '25', 'order' => 20, 'title' => 'payment_status', 'icon' => 'fa-recycle', 'uri' => 'shop_payment_status'],
            ['id' => '28', 'parent_id' => '25', 'order' => 21, 'title' => 'shipping_status', 'icon' => 'fa-ambulance', 'uri' => 'shop_shipping_status'],
            ['id' => '30', 'parent_id' => '0', 'order' => 25, 'title' => 'extensions', 'icon' => 'fa-puzzle-piece', 'uri' => ''],
            ['id' => '31', 'parent_id' => '0', 'order' => 22, 'title' => 'customer_manager', 'icon' => 'fa-group', 'uri' => ''],
            ['id' => '51', 'parent_id' => '23', 'order' => 44, 'title' => 'config_global', 'icon' => 'fa-cogs', 'uri' => 'config_global'],
            ['id' => '52', 'parent_id' => '56', 'order' => 49, 'title' => 'config_language', 'icon' => 'fa-pagelines', 'uri' => 'language'],
            ['id' => '53', 'parent_id' => '101', 'order' => 34, 'title' => 'design_layout', 'icon' => 'fa-newspaper-o', 'uri' => 'layout'],
            ['id' => '56', 'parent_id' => '23', 'order' => 48, 'title' => 'localisation', 'icon' => 'fa-shirtsinbulk', 'uri' => ''],
            ['id' => '57', 'parent_id' => '15', 'order' => 14, 'title' => 'vendor', 'icon' => 'fa-user-secret', 'uri' => 'shop_vendor'],
            ['id' => '58', 'parent_id' => '0', 'order' => 52, 'title' => 'report_analytics', 'icon' => 'fa-pie-chart', 'uri' => ''],
            ['id' => '59', 'parent_id' => '58', 'order' => 53, 'title' => 'customer_report', 'icon' => 'fa-bars', 'uri' => 'shop_report/customer'],
            ['id' => '60', 'parent_id' => '58', 'order' => 54, 'title' => 'product_report', 'icon' => 'fa-bars', 'uri' => 'shop_report/product'],
            ['id' => '61', 'parent_id' => '15', 'order' => 15, 'title' => 'import_product', 'icon' => 'fa-save', 'uri' => 'shop_process/productImport'],
            ['id' => '62', 'parent_id' => '0', 'order' => 37, 'title' => 'file_manager', 'icon' => 'fa-image', 'uri' => ''],
            ['id' => '63', 'parent_id' => '62', 'order' => 39, 'title' => 'images_manager', 'icon' => 'fa-file-image-o', 'uri' => 'documents'],
            ['id' => '64', 'parent_id' => '56', 'order' => 50, 'title' => 'currencies', 'icon' => 'fa-dollar', 'uri' => 'currencies'],
            ['id' => '65', 'parent_id' => '0', 'order' => 40, 'title' => 'api_manager', 'icon' => 'fa-plug', 'uri' => ''],
            ['id' => '66', 'parent_id' => '65', 'order' => 41, 'title' => 'shop_api', 'icon' => 'fa-usb', 'uri' => 'modules/api/shop_api'],
            ['id' => '70', 'parent_id' => '15', 'order' => 16, 'title' => 'attributes_group', 'icon' => 'fa-bars', 'uri' => 'shop_attribute_group'],
            ['id' => '71', 'parent_id' => '30', 'order' => 26, 'title' => 'payment', 'icon' => 'fa-money', 'uri' => 'extensions/payment'],
            ['id' => '72', 'parent_id' => '30', 'order' => 27, 'title' => 'shipping', 'icon' => 'fa-ambulance', 'uri' => 'extensions/shipping'],
            ['id' => '73', 'parent_id' => '30', 'order' => 28, 'title' => 'total', 'icon' => 'fa-cog', 'uri' => 'extensions/total'],
            ['id' => '74', 'parent_id' => '30', 'order' => 29, 'title' => 'other_extension', 'icon' => 'fa-circle-thin', 'uri' => 'extensions/other'],
            ['id' => '75', 'parent_id' => '0', 'order' => 30, 'title' => 'modules', 'icon' => 'fa-codepen', 'uri' => ''],
            ['id' => '76', 'parent_id' => '75', 'order' => 31, 'title' => 'cms', 'icon' => 'fa-modx', 'uri' => 'modules/cms'],
            ['id' => '81', 'parent_id' => '101', 'order' => 36, 'title' => 'templates_manager', 'icon' => 'fa-columns', 'uri' => 'config_template'],
            ['id' => '82', 'parent_id' => '23', 'order' => 51, 'title' => 'backup_restore', 'icon' => 'fa-save', 'uri' => 'backup_database'],
            ['id' => '83', 'parent_id' => '21', 'order' => 34, 'title' => 'subscribe_manager', 'icon' => 'fa-user-md', 'uri' => 'subscribe'],
            ['id' => '101', 'parent_id' => '0', 'order' => 33, 'title' => 'template_layout', 'icon' => 'fa-object-ungroup', 'uri' => ''],
            ['id' => '102', 'parent_id' => '75', 'order' => 32, 'title' => 'other_module', 'icon' => 'fa-bars', 'uri' => 'modules/other'],
            ['id' => '105', 'parent_id' => '101', 'order' => 35, 'title' => 'url', 'icon' => 'fa-chrome', 'uri' => 'layout_url'],
            ['id' => '108', 'parent_id' => '23', 'order' => 45, 'title' => 'email_setting', 'icon' => 'fa-envelope', 'uri' => ''],
            ['id' => '109', 'parent_id' => '108', 'order' => 46, 'title' => 'email_config', 'icon' => 'fa-gear', 'uri' => 'email_config'],
            ['id' => '110', 'parent_id' => '108', 'order' => 47, 'title' => 'email_template', 'icon' => 'fa-bars', 'uri' => 'email_template'],
            ['id' => '111', 'parent_id' => '0', 'order' => 55, 'title' => 'Helpers', 'icon' => 'fa-gears', 'uri' => ''],
            ['id' => '112', 'parent_id' => '111', 'order' => 56, 'title' => 'Scaffold', 'icon' => 'fa-keyboard-o', 'uri' => 'helpers/scaffold'],
            ['id' => '113', 'parent_id' => '111', 'order' => 57, 'title' => 'Database terminal', 'icon' => 'fa-database', 'uri' => 'helpers/terminal/database'],
            ['id' => '114', 'parent_id' => '111', 'order' => 58, 'title' => 'Laravel artisan', 'icon' => 'fa-terminal', 'uri' => 'helpers/terminal/artisan'],
            ['id' => '115', 'parent_id' => '111', 'order' => 59, 'title' => 'Routes', 'icon' => 'fa-list-alt', 'uri' => 'helpers/routes']]
        );

        DB::table(config('admin.database.permissions_table'))->insert([
            ['id' => '1', 'name' => 'All permission', 'slug' => '*', 'http_method' => '', 'http_path' => '*'],
            ['id' => '2', 'name' => 'Dashboard', 'slug' => 'dashboard', 'http_method' => 'GET', 'http_path' => '/'],
            ['id' => '3', 'name' => 'Login', 'slug' => 'auth.login', 'http_method' => '', 'http_path' => '/auth/login
/auth/logout'],
            ['id' => '4', 'name' => 'User setting', 'slug' => 'auth.setting', 'http_method' => 'GET,PUT,DELETE', 'http_path' => '/auth/setting'],
            ['id' => '5', 'name' => 'Auth management', 'slug' => 'auth.management', 'http_method' => '', 'http_path' => '/auth/roles
/auth/permissions
/auth/menu
/auth/logs'],
            ['id' => '6', 'name' => 'System manager', 'slug' => 'system.mamanger', 'http_method' => '', 'http_path' => '/config_info*
/config_global*
/language*
/currencies*
/backup_database*'],
            ['id' => '7', 'name' => 'API manager', 'slug' => 'api.manager', 'http_method' => '', 'http_path' => '/modules/api/*'],
            ['id' => '8', 'name' => 'Template & Layout', 'slug' => 'template.layout', 'http_method' => '', 'http_path' => '/layout*
/config_template*'],
            ['id' => '9', 'name' => 'Email setting', 'slug' => 'email.setting', 'http_method' => '', 'http_path' => '/email_*'],
            ['id' => '10', 'name' => 'View all', 'slug' => 'view.all', 'http_method' => 'GET', 'http_path' => '*'],
            ['id' => '11', 'name' => 'CMS manager', 'slug' => 'cms.manager', 'http_method' => '', 'http_path' => '/modules/cms/*
/shop_page*'],
            ['id' => '12', 'name' => 'Product manager', 'slug' => 'product.manager', 'http_method' => '', 'http_path' => '/shop_category*
/shop_product*
/shop_special_price*
/shop_brand*
/shop_vendor*
/shop_attribute_group*
/shop_process*'],
            ['id' => '13', 'name' => 'Admin helpers', 'slug' => 'ext.helpers', 'http_method' => '', 'http_path' => '/helpers/*'],
            ['id' => '14', 'name' => 'Report shop', 'slug' => 'report.shop', 'http_method' => 'GET', 'http_path' => '/shop_report/*'],
            ['id' => '15', 'name' => 'File manager', 'slug' => 'file.manager', 'http_method' => '', 'http_path' => '/banner/*
/documents/*'],
            ['id' => '16', 'name' => 'Order Manager', 'slug' => 'order.manager', 'http_method' => '', 'http_path' => '/shop_order*
/shop_payment_status*
/shop_shipping_status*'],
            ['id' => '17', 'name' => 'Customer manager', 'slug' => 'customer.manager', 'http_method' => '', 'http_path' => '/shop_customer*
/subscribe*'],
            ['id' => '18', 'name' => 'Extensions Manager', 'slug' => 'extensions.manager', 'http_method' => '', 'http_path' => '/extensions*'],
            ['id' => '19', 'name' => 'User manager', 'slug' => 'user.manager', 'http_method' => '', 'http_path' => '/auth/users*'],
        ]
        );

        DB::table(config('admin.database.roles_table'))->insert([
            ['id' => '1', 'name' => 'Administrator', 'slug' => 'administrator'],
            ['id' => '2', 'name' => 'Admin', 'slug' => 'admin'],
            ['id' => '3', 'name' => 'Group only View', 'slug' => 'views'],
            ['id' => '4', 'name' => 'Cms manager', 'slug' => 'cms'],
            ['id' => '5', 'name' => 'Sales', 'slug' => 'sale'],
            ['id' => '6', 'name' => 'Marketing', 'slug' => 'maketing']]
        );

        DB::table(config('admin.database.role_permissions_table'))->insert([
            ['role_id' => '1', 'permission_id' => '1'],
            ['role_id' => '2', 'permission_id' => '2'],
            ['role_id' => '2', 'permission_id' => '3'],
            ['role_id' => '2', 'permission_id' => '4'],
            ['role_id' => '4', 'permission_id' => '4'],
            ['role_id' => '4', 'permission_id' => '3'],
            ['role_id' => '3', 'permission_id' => '10'],
            ['role_id' => '2', 'permission_id' => '6'],
            ['role_id' => '2', 'permission_id' => '7'],
            ['role_id' => '2', 'permission_id' => '8'],
            ['role_id' => '2', 'permission_id' => '9'],
            ['role_id' => '2', 'permission_id' => '11'],
            ['role_id' => '2', 'permission_id' => '12'],
            ['role_id' => '2', 'permission_id' => '13'],
            ['role_id' => '2', 'permission_id' => '14'],
            ['role_id' => '2', 'permission_id' => '15'],
            ['role_id' => '2', 'permission_id' => '16'],
            ['role_id' => '2', 'permission_id' => '17'],
            ['role_id' => '2', 'permission_id' => '18'],
            ['role_id' => '2', 'permission_id' => '19'],
            ['role_id' => '4', 'permission_id' => '11'],
            ['role_id' => '5', 'permission_id' => '2'],
            ['role_id' => '5', 'permission_id' => '3'],
            ['role_id' => '5', 'permission_id' => '12'],
            ['role_id' => '5', 'permission_id' => '14'],
            ['role_id' => '5', 'permission_id' => '16'],
            ['role_id' => '5', 'permission_id' => '17'],
            ['role_id' => '6', 'permission_id' => '2'],
            ['role_id' => '6', 'permission_id' => '3'],
            ['role_id' => '6', 'permission_id' => '4'],
            ['role_id' => '6', 'permission_id' => '8'],
            ['role_id' => '6', 'permission_id' => '9'],
            ['role_id' => '6', 'permission_id' => '11'],
            ['role_id' => '6', 'permission_id' => '12'],
            ['role_id' => '6', 'permission_id' => '14'],
            ['role_id' => '6', 'permission_id' => '15'],
            ['role_id' => '6', 'permission_id' => '16'],
            ['role_id' => '6', 'permission_id' => '17'],
            ['role_id' => '4', 'permission_id' => '15'],
            ['role_id' => '5', 'permission_id' => '15']]
        );

        DB::table(config('admin.database.role_users_table'))->insert(
            ['role_id' => '1', 'user_id' => '1']
        );

        DB::table(config('admin.database.users_table'))->insert(
            ['id' => '1', 'username' => 'admin', 'password' => '$2y$10$JcmAHe5eUZ2rS0jU1GWr/.xhwCnh2RU13qwjTPcqfmtZXjZxcryPO', 'name' => 'Administrator', 'avatar' => 'images/user2-160x160.jpg']
        );

    }
}
