<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertDataScart extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 100)->nullable();
            $table->string('url', 100)->nullable();
            $table->text('html')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('sort')->default(0);
            $table->tinyInteger('click')->default(0);
            $table->tinyInteger('type')->default(0);
            $table->timestamps();
        });

        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 50)->nullable();
            $table->string('code', 50);
            $table->string('key', 50)->unique();
            $table->string('value', 200)->nullable();
            $table->tinyInteger('sort')->default(0);
            $table->string('detail', 300)->nullable();

        });

        Schema::create('config_global', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo', 100)->nullable();
            $table->string('watermark', 100)->nullable();
            $table->string('template', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('long_phone', 100)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('time_active', 200);
            $table->string('address', 300);
            $table->string('locale', 50)->nullable();
            $table->string('timezone', 50)->nullable();
            $table->text('maintain_content')->nullable();
            $table->string('currency', 10)->nullable();
        });

        Schema::create('config_global_description', function (Blueprint $table) {
            $table->integer('config_id');
            $table->integer('lang_id');
            $table->string('title', 300)->nullable();
            $table->string('description', 300)->nullable();
            $table->string('keyword', 300)->nullable();
            $table->unique(['config_id', 'lang_id']);
        });

        Schema::create('email_template', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('group', 50);
            $table->text('text');
            $table->tinyInteger('status')->default(0);
        });

        Schema::create('language', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('code', 50)->unique();
            $table->string('icon', 100)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('sort')->default(0);
        });

        Schema::create('layout', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('position', 100);
            $table->string('page', 200)->nullable();
            $table->string('type', 200);
            $table->text('text')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('sort')->default(0);
        });

        Schema::create('layout_page', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uniquekey', 100)->unique();
            $table->string('name', 100);
        });

        Schema::create('layout_position', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uniquekey', 100)->unique();
            $table->string('name', 100);
        });

        Schema::create('layout_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uniquekey', 100)->unique();
            $table->string('name', 100);
        });

        Schema::create('layout_url', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('url', 100);
            $table->string('target', 100);
            $table->string('group', 100);
            $table->string('module', 100)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('sort')->default(0);
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email', 50);
            $table->string('token', 255);
            $table->dateTime('created_at');
            $table->index('email');
        });

        Schema::create('shipping_standard', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fee');
            $table->integer('shipping_free');
        });

        Schema::create('shop_api', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->unique();
            $table->string('hidden_default', 255)->nullable();
            $table->string('type', 50);
        });
        Schema::create('shop_api_process', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('api_id');
            $table->string('secret_key', 100)->unique();
            $table->string('hidden_fileds', 255)->nullable();
            $table->string('ip_allow', 300)->nullable();
            $table->string('ip_deny', 300)->nullable();
            $table->dateTime('exp')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::create('shop_attribute_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('attribute_id');
            $table->integer('product_id');
            $table->tinyInteger('sort')->default(0);
        });

        Schema::create('shop_attribute_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('sort')->default(0);
            $table->string('type', 50);
        });

        Schema::create('shop_brand', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('image', 100)->nullable();
            $table->string('url', 100)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('sort')->default(0);
        });

        Schema::create('shop_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 100)->nullable();
            $table->integer('parent')->default(0);
            $table->integer('top')->nullable()->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('sort')->default(0);
        });

        Schema::create('shop_category_description', function (Blueprint $table) {
            $table->integer('shop_category_id');
            $table->integer('lang_id');
            $table->string('name', 100)->nullable();
            $table->string('keyword', 300)->nullable();
            $table->string('description', 500)->nullable();
            $table->unique(['shop_category_id', 'lang_id']);
        });

        Schema::create('shop_currency', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('code', 10)->unique();
            $table->string('symbol', 10);
            $table->float('exchange_rate');
            $table->tinyInteger('precision')->default(2);
            $table->tinyInteger('symbol_first')->default(0);
            $table->string('thousands')->default(',');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('sort')->default(0);
        });

        Schema::create('shop_discount', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10)->unique();
            $table->integer('reward')->default(2);
            $table->integer('type')->default(0);
            $table->string('data', 300)->nullable();
            $table->integer('number_uses')->default(1);
            $table->integer('used')->default(0);
            $table->integer('login')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->dateTime('expires_at');
        });

        Schema::create('shop_discount_user', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('discount_id');
            $table->string('log', 300);
            $table->dateTime('used_at');
        });

        Schema::create('shop_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('subtotal')->nullable()->default(0);
            $table->integer('shipping')->nullable()->default(0);
            $table->integer('discount')->nullable()->default(0);
            $table->integer('payment_status')->default(0);
            $table->integer('shipping_status')->default(0);
            $table->integer('status')->default(0);
            $table->integer('tax')->nullable()->default(0);
            $table->integer('total')->nullable()->default(0);
            $table->string('currency', 10);
            $table->float('exchange_rate')->nullable();
            $table->integer('received')->nullable()->default(0);
            $table->integer('balance')->nullable()->default(0);
            $table->string('toname', 100);
            $table->string('address1', 100);
            $table->string('address2', 100);
            $table->integer('country')->nullable();
            $table->string('phone', 50);
            $table->string('email', 100);
            $table->string('comment', 300)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->string('transaction', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('shop_order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->string('name', 100);
            $table->integer('price')->default(0);
            $table->integer('qty')->default(0);
            $table->integer('total_price')->default(0);
            $table->string('sku', 50);
            $table->string('type', 100)->nullable();
            $table->string('currency', 10)->nullable();
            $table->float('exchange_rate')->nullable();
            $table->string('attribute', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('shop_order_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('content', 300);
            $table->integer('admin_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->dateTime('add_date');
        });

        Schema::create('shop_order_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);

        });

        Schema::create('shop_order_total', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('title', 100);
            $table->string('code', 100);
            $table->integer('value')->default(0);
            $table->string('text', 200)->nullable();
            $table->integer('sort')->default(1);
            $table->timestamps();
        });

        Schema::create('shop_page', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 100)->nullable();
            $table->string('uniquekey', 100)->unique();
            $table->integer('status')->default(0);
        });

        Schema::create('shop_page_description', function (Blueprint $table) {
            $table->integer('page_id');
            $table->integer('lang_id');
            $table->string('title', 200)->nullable();
            $table->string('keyword', 200)->nullable();
            $table->string('description', 200)->nullable();
            $table->text('content')->nullable();
            $table->unique(['page_id', 'lang_id']);
        });

        Schema::create('shop_payment_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);

        });

        Schema::create('shop_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku', 50)->unique();
            $table->string('image', 100)->nullable();
            $table->integer('brand_id')->nullable()->default(0);
            $table->integer('vendor_id')->nullable()->default(0);
            $table->integer('category_id')->nullable()->default(0);
            $table->string('category_other', 50)->nullable();
            $table->integer('price')->default(0);
            $table->integer('cost')->nullable()->default(0);
            $table->integer('stock')->default(0);
            $table->integer('sold')->default(0);
            $table->integer('type')->default(0);
            $table->string('option', 200)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('sort')->default(0);
            $table->integer('view')->default(0);
            $table->dateTime('date_lastview')->nullable();
            $table->dateTime('date_available')->nullable();
            $table->timestamps();
        });

        Schema::create('shop_product_description', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('lang_id');
            $table->string('name', 200)->nullable();
            $table->string('keyword', 200)->nullable();
            $table->string('description', 200)->nullable();
            $table->text('content')->nullable();
            $table->unique(['product_id', 'lang_id']);
        });

        Schema::create('shop_product_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 200)->nullable();
            $table->integer('product_id')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('sort')->default(0);
        });

        Schema::create('shop_product_like', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('users_id');
            $table->dateTime('created_at');
            $table->primary(['product_id', 'users_id']);
        });

        Schema::create('shop_product_option', function (Blueprint $table) {
            $table->integer('id');
            $table->string('opt_name', 200)->nullable();
            $table->string('opt_sku', 50)->unique();
            $table->integer('opt_price')->default(0);
            $table->string('opt_image', 100)->nullable();
            $table->integer('product_id');
        });

        Schema::create('shop_shipping', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->default(0);
            $table->integer('value')->default(0);
            $table->integer('free')->default(0);
            $table->integer('status')->default(1);
        });

        Schema::create('shop_shipping_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);

        });

        Schema::create('shop_shoppingcart', function (Blueprint $table) {
            $table->string('identifier', 100);
            $table->string('instance', 100);
            $table->text('content');
            $table->timestamps();
            $table->index(['identifier', 'instance']);
        });

        Schema::create('shop_special_price', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('price');
            $table->integer('off')->default(0);
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->integer('status')->default(0);
            $table->string('comment', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('shop_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->string('address1', 100);
            $table->string('address2', 100);
            $table->string('phone', 100);
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('shop_vendor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('image', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('url', 100)->nullable();
            $table->tinyInteger('sort')->default(0);
        });

        Schema::create('subscribe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100);
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
        Schema::dropIfExists('banner');
        Schema::dropIfExists('config');
        Schema::dropIfExists('config_global');
        Schema::dropIfExists('config_global_description');
        Schema::dropIfExists('email_template');
        Schema::dropIfExists('language');
        Schema::dropIfExists('layout');
        Schema::dropIfExists('layout_page');
        Schema::dropIfExists('layout_position');
        Schema::dropIfExists('layout_type');
        Schema::dropIfExists('layout_url');
        Schema::dropIfExists('migrations');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('shipping_standard');
        Schema::dropIfExists('shop_api');
        Schema::dropIfExists('shop_api_process');
        Schema::dropIfExists('shop_attribute_detail');
        Schema::dropIfExists('shop_attribute_group');
        Schema::dropIfExists('shop_brand');
        Schema::dropIfExists('shop_category');
        Schema::dropIfExists('shop_category_description');
        Schema::dropIfExists('shop_currency');
        Schema::dropIfExists('shop_discount');
        Schema::dropIfExists('shop_discount_user');
        Schema::dropIfExists('shop_order');
        Schema::dropIfExists('shop_order_detail');
        Schema::dropIfExists('shop_order_history');
        Schema::dropIfExists('shop_order_status');
        Schema::dropIfExists('shop_order_total');
        Schema::dropIfExists('shop_page');
        Schema::dropIfExists('shop_page_description');
        Schema::dropIfExists('shop_payment_status');
        Schema::dropIfExists('shop_product');
        Schema::dropIfExists('shop_product_description');
        Schema::dropIfExists('shop_product_image');
        Schema::dropIfExists('shop_product_like');
        Schema::dropIfExists('shop_product_option');
        Schema::dropIfExists('shop_shipping');
        Schema::dropIfExists('shop_shipping_status');
        Schema::dropIfExists('shop_shoppingcart');
        Schema::dropIfExists('shop_special_price');
        Schema::dropIfExists('shop_users');
        Schema::dropIfExists('shop_vendor');
        Schema::dropIfExists('subscribe');
    }

    public function importData()
    {
        DB::table('banner')->insert(
            ['image' => 'banner/6122cfae7fdb5fff1a4e7406dcab10ef.jpg', 'html' => '<h1>S-CART</h1><h2>Free E-Commerce Template</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p><button type="button" class="btn btn-default get">Get it now</button>', 'status' => 1, 'type' => 1]
        );

        DB::table('config')->insert([
            ['type' => '', 'code' => 'config', 'key' => 'shop_allow_guest', 'value' => '1', 'sort' => '11', 'detail' => 'language.admin.shop_allow_guest'],
            ['type' => '', 'code' => 'config', 'key' => 'product_preorder', 'value' => '1', 'sort' => '18', 'detail' => 'language.admin.product_preorder'],
            ['type' => '', 'code' => 'config', 'key' => 'product_display_out_of_stock', 'value' => '1', 'sort' => '19', 'detail' => 'language.admin.product_display_out_of_stock'],
            ['type' => '', 'code' => 'config', 'key' => 'product_buy_out_of_stock', 'value' => '1', 'sort' => '20', 'detail' => 'language.admin.product_buy_out_of_stock'],
            ['type' => '', 'code' => 'config', 'key' => 'show_date_available', 'value' => '1', 'sort' => '21', 'detail' => 'language.admin.show_date_available'],
            ['type' => '', 'code' => 'config', 'key' => 'site_ssl', 'value' => '0', 'sort' => '0', 'detail' => 'language.admin.enable_https'],
            ['type' => '', 'code' => 'config', 'key' => 'watermark', 'value' => '1', 'sort' => '0', 'detail' => 'language.admin.enable_watermark'],
            ['type' => '', 'code' => 'config', 'key' => 'site_status', 'value' => '1', 'sort' => '100', 'detail' => 'language.admin.site_status'],
            ['type' => '', 'code' => 'config', 'key' => 'show_product_of_category_children', 'value' => '1', 'sort' => '21', 'detail' => 'language.admin.show_product_of_category_children'],
            ['type' => '', 'code' => 'config', 'key' => 'admin_log', 'value' => '1', 'sort' => '20', 'detail' => 'language.admin.admin_log'],
            ['type' => '', 'code' => 'display', 'key' => 'product_hot', 'value' => '6', 'sort' => '0', 'detail' => 'language.admin.hot_product'],
            ['type' => '', 'code' => 'display', 'key' => 'product_new', 'value' => '6', 'sort' => '0', 'detail' => 'languagelanguage.admin.new_product'],
            ['type' => '', 'code' => 'display', 'key' => 'product_list', 'value' => '18', 'sort' => '0', 'detail' => 'language.admin.list_product'],
            ['type' => '', 'code' => 'display', 'key' => 'product_relation', 'value' => '4', 'sort' => '0', 'detail' => 'language.admin.relation_product'],
            ['type' => '', 'code' => 'display', 'key' => 'product_viewed', 'value' => '4', 'sort' => '0', 'detail' => 'language.admin.viewed_product'],
            ['type' => '', 'code' => 'display', 'key' => 'item_list', 'value' => '12', 'sort' => '0', 'detail' => 'language.admin.item_list'],
            ['type' => '', 'code' => 'email_action', 'key' => 'email_action_mode', 'value' => '0', 'sort' => '0', 'detail' => 'language.admin.email_action.email_action_mode'],
            ['type' => '', 'code' => 'email_action', 'key' => 'order_success_to_admin', 'value' => '0', 'sort' => '1', 'detail' => 'language.admin.email_action.order_success_to_admin'],
            ['type' => '', 'code' => 'email_action', 'key' => 'order_success_to_customer', 'value' => '0', 'sort' => '2', 'detail' => 'language.admin.email_action.order_success_to_cutomer'],
            ['type' => '', 'code' => 'email_action', 'key' => 'forgot_password', 'value' => '0', 'sort' => '3', 'detail' => 'language.admin.email_action.forgot_password'],
            ['type' => '', 'code' => 'email_action', 'key' => 'welcome_customer', 'value' => '0', 'sort' => '4', 'detail' => 'language.admin.email_action.welcome_customer'],
            ['type' => '', 'code' => 'email_action', 'key' => 'contact_to_admin', 'value' => '0', 'sort' => '6', 'detail' => 'language.admin.email_action.contact_to_admin'],
            ['type' => '', 'code' => 'email_action', 'key' => 'email_action_smtp_mode', 'value' => '0', 'sort' => '6', 'detail' => 'language.admin.email_action.email_action_smtp_mode'],
            ['type' => 'Modules', 'code' => 'Other', 'key' => 'LastViewProduct', 'value' => '1', 'sort' => '0', 'detail' => 'Modules/Other/LastViewProduct.title'],
            ['type' => 'Extensions', 'code' => 'Payment', 'key' => 'Cash', 'value' => '1', 'sort' => '0', 'detail' => 'Extensions/Payment/Cash.title'],
            ['type' => 'Extensions', 'code' => 'Shipping', 'key' => 'ShippingStandard', 'value' => '1', 'sort' => '0', 'detail' => 'Shipping Standard'],
            ['type' => '', 'code' => 'smtp', 'key' => 'smtp_host', 'value' => '', 'sort' => '8', 'detail' => 'language.admin.smtp_host'],
            ['type' => '', 'code' => 'smtp', 'key' => 'smtp_user', 'value' => '', 'sort' => '7', 'detail' => 'language.admin.smtp_user'],
            ['type' => '', 'code' => 'smtp', 'key' => 'smtp_password', 'value' => '', 'sort' => '6', 'detail' => 'language.admin.smtp_password'],
            ['type' => '', 'code' => 'smtp', 'key' => 'smtp_security', 'value' => '', 'sort' => '5', 'detail' => 'language.admin.smtp_security'],
            ['type' => '', 'code' => 'smtp', 'key' => 'smtp_port', 'value' => '', 'sort' => '4', 'detail' => 'language.admin.smtp_port'],
            ['type' => 'Extensions', 'code' => 'Total', 'key' => 'Discount', 'value' => '1', 'sort' => '0', 'detail' => 'Extensions/Total/Discount.title'],
        ]);
        DB::table('config_global')->insert(
            ['logo' => 'images/scart-mid.png', 'watermark' => 'images/watermark.png', 'template' => 'default', 'phone' => '0123456789', 'long_phone' => 'Support: 0987654321', 'email' => 'admin@gmail.com', 'time_active' => '', 'address' => '123st - abc - xyz', 'locale' => 'en', 'timezone' => 'Asia/Ho_Chi_Minh', 'maintain_content' => '<center><img src="/images/maintenance.png" />
<h3><span style="color:#e74c3c;"><strong>Sorry! We are currently doing site maintenance!</strong></span></h3>
</center>', 'currency' => 'USD']
        );

        DB::table('config_global_description')->insert([
            ['config_id' => '1', 'lang_id' => '1', 'title' => 'Demo S-cart: Free open source - eCommerce Platform for Business', 'description' => 'Free website shopping cart for business', 'keyword' => ''],
            ['config_id' => '1', 'lang_id' => '2', 'title' => 'Demo S-cart: xây dựng website bán hàng miễn phí cho doanh nghiệp', 'description' => 'Free website shopping cart for business', 'keyword' => ''],
        ]);

        DB::table('email_template')->insert([
            ['name' => 'Reset password', 'group' => 'forgot_password', 'text' => '<h1 style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#2f3133;font-size:19px;font-weight:bold;margin-top:0;text-align:left">{{$title}}</h1>
<p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">{{$text1}}</p>
                    <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:30px auto;padding:0;text-align:center;width:100%">
                      <tbody><tr>
                        <td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                            <tbody><tr>
                              <td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                <table border="0" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                  <tbody><tr>
                                    <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                      <a href="{{$reset_link}}" class="button button-primary" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;border-radius:3px;color:#fff;display:inline-block;text-decoration:none;background-color:#3097d1;border-top:10px solid #3097d1;border-right:18px solid #3097d1;border-bottom:10px solid #3097d1;border-left:18px solid #3097d1" target="_blank">{{$reset_button}}</a>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                      {{$text2}}
                    </p>
                    <table class="subcopy" width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;border-top:1px solid #edeff2;margin-top:25px;padding-top:25px">
                    <tbody><tr>
                      <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                        <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;line-height:1.5em;margin-top:0;text-align:left;font-size:12px">{{$text3}}: <a href="{{$reset_link}}" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#3869d4" target="_blank">{{$reset_link}}</a></p>
                          </td>
                        </tr>
                      </tbody>
                    </table>', 'status' => '1'],

            ['name' => 'Welcome new customer', 'group' => 'welcome_customer', 'text' => '<h1 style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#2f3133;font-size:19px;font-weight:bold;margin-top:0;text-align:center">{{$title}}</h1>
<p style="text-align:center;">Welcome to my site!</p>', 'status' => '1'],
            ['name' => 'Send form contact to admin', 'group' => 'contact_to_admin', 'text' => '<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <b>Name</b>: {{$name}}<br>
            <b>Email</b>: {{$email}}<br>
            <b>Phone</b>: {{$phone}}<br>
        </td>
    </tr>
</table>
<hr>
<p style="text-align: center;">Content:<br>
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>{{$content}}</td>
    </tr>
</table>', 'status' => '1'],

            ['name' => 'New order to admin', 'group' => 'order_success_to_admin', 'text' => '<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <b>Order ID</b>: {{$orderID}}<br>
                                <b>Customer name</b>: {{$toname}}<br>
                                <b>Email</b>: {{$email}}<br>
                                <b>Address</b>: {{$address}}<br>
                                <b>Phone</b>: {{$phone}}<br>
                                <b>Order note</b>: {{$comment}}
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <p style="text-align: center;">Order detail:<br>
                    ===================================<br></p>
                    <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" border="1">
                        {{$orderDetail}}
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" style="font-weight: bold;">Sub total</td>
                            <td colspan="2" align="right">{{$subtotal}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" style="font-weight: bold;">Shipping fee</td>
                            <td colspan="2" align="right">{{$shipping}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" style="font-weight: bold;">Discount</td>
                            <td colspan="2" align="right">{{$discount}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" style="font-weight: bold;">Total</td>
                            <td colspan="2" align="right">{{$total}}</td>
                        </tr>
                    </table>', 'status' => '1'],

            ['name' => 'New order to customr', 'group' => 'order_success_to_customer', 'text' => '<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <b>Order ID</b>: {{$orderID}}<br>
                                <b>Customer name</b>: {{$toname}}<br>
                                <b>Address</b>: {{$address}}<br>
                                <b>Phone</b>: {{$phone}}<br>
                                <b>Order note</b>: {{$comment}}
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <p style="text-align: center;">Order detail:<br>
                    ===================================<br></p>
                    <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" border="1">
                        {{$orderDetail}}
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" style="font-weight: bold;">Sub total</td>
                            <td colspan="2" align="right">{{$subtotal}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" style="font-weight: bold;">Shipping fee</td>
                            <td colspan="2" align="right">{{$shipping}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" style="font-weight: bold;">Discount</td>
                            <td colspan="2" align="right">{{$discount}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" style="font-weight: bold;">Total</td>
                            <td colspan="2" align="right">{{$total}}</td>
                        </tr>
                    </table>', 'status' => '1'],
        ]);

        DB::table('language')->insert([
            ['id' => '1', 'name' => 'English', 'code' => 'en', 'icon' => 'language/flag_uk.png', 'status' => '1', 'sort' => '1'],
            ['id' => '2', 'name' => 'Tiếng Việt', 'code' => 'vi', 'icon' => 'language/flag_vn.png', 'status' => '1', 'sort' => '1'],
        ]);

        DB::table('layout')->insert([
            ['name' => 'Facebook code', 'position' => 'top', 'page' => '', 'type' => 'html', 'text' => '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \'//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=934208239994473\';
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));
</script>', 'status' => '1', 'sort' => '0'],
            ['name' => 'Google Analytics', 'position' => 'header', 'page' => '', 'type' => 'html', 'text' => '<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128658138-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag(\'js\', new Date());
  gtag(\'config\', \'UA-128658138-1\');
</script>', 'status' => '1', 'sort' => '0'],

            ['name' => 'Product special', 'position' => 'left', 'page' => 'home,product_list', 'type' => 'view', 'text' => 'product_special', 'status' => '1', 'sort' => '1'],
            ['name' => 'Brands', 'position' => 'left', 'page' => 'home,item_list', 'type' => 'view', 'text' => 'brands_left', 'status' => '1', 'sort' => '3'],
            ['name' => 'Banner home', 'position' => 'banner_top', 'page' => 'home', 'type' => 'view', 'text' => 'banner_image', 'status' => '1', 'sort' => '0'],
            ['name' => 'Categories', 'position' => 'left', 'page' => 'home,product_list,product_detail,shop_wishlist', 'type' => 'view', 'text' => 'categories', 'status' => '1', 'sort' => '4'],
            ['name' => 'Product last view', 'position' => 'left', 'page' => '', 'type' => 'module', 'text' => '\App\Modules\Other\Controllers\LastViewProduct', 'status' => '1', 'sort' => '0'],

        ]);

        DB::table('layout_page')->insert([
            ['uniquekey' => 'home', 'name' => 'Home page'],
            ['uniquekey' => 'product_list', 'name' => 'Product list'],
            ['uniquekey' => 'product_detail', 'name' => 'Product detail'],
            ['uniquekey' => 'shop_cart', 'name' => 'Shop cart'],
            ['uniquekey' => 'shop_account', 'name' => 'Account'],
            ['uniquekey' => 'shop_profile', 'name' => 'Profile'],
            ['uniquekey' => 'shop_compare', 'name' => 'Compare page'],
            ['uniquekey' => 'shop_wishlist', 'name' => 'Wishlist page'],
            ['uniquekey' => 'item_list', 'name' => 'Item list'],
        ]);
        DB::table('layout_position')->insert([
            ['uniquekey' => 'meta', 'name' => 'Meta'],
            ['uniquekey' => 'header', 'name' => 'Header'],
            ['uniquekey' => 'top', 'name' => 'Top'],
            ['uniquekey' => 'bottom', 'name' => 'Bottom'],
            ['uniquekey' => 'footer', 'name' => 'Footer'],
            ['uniquekey' => 'left', 'name' => 'Column left'],
            ['uniquekey' => 'right', 'name' => 'Column right'],
            ['uniquekey' => 'banner_top', 'name' => 'Banner top'],
        ]);
        DB::table('layout_type')->insert([
            ['uniquekey' => 'html', 'name' => 'Html'],
            ['uniquekey' => 'view', 'name' => 'View'],
            ['uniquekey' => 'module', 'name' => 'Module'],
        ]);
        DB::table('layout_url')->insert([
            ['name' => 'language.contact', 'url' => '/contact.html', 'target' => '_self', 'group' => 'menu', 'module' => '', 'status' => '1', 'sort' => '3'],
            ['name' => 'language.about', 'url' => '/about.html', 'target' => '_self', 'group' => 'menu', 'module' => '', 'status' => '1', 'sort' => '4'],
            ['name' => 'S-Cart', 'url' => 'https://s-cart.org', 'target' => '_blank', 'group' => 'menu', 'module' => '', 'status' => '1', 'sort' => '0'],
            ['name' => 'language.my_profile', 'url' => '/member/login.html', 'target' => '_self', 'group' => 'footer', 'module' => '', 'status' => '1', 'sort' => '5'],
            ['name' => 'language.compare_page', 'url' => '/compare.html', 'target' => '_self', 'group' => 'footer', 'module' => '', 'status' => '1', 'sort' => '4'],
            ['name' => 'language.wishlist_page', 'url' => '/wishlist.html', 'target' => '_self', 'group' => 'footer', 'module' => '', 'status' => '1', 'sort' => '3'],
        ]);
        DB::table('shipping_standard')->insert([
            ['fee' => 20000, 'shipping_free' => 100000],
        ]);

        DB::table('shop_api')->insert([
            ['name' => 'api_product_list', 'hidden_default' => '', 'type' => 'secret'],
            ['name' => 'api_product_detail', 'hidden_default' => 'cost,sold,stock,sort', 'type' => 'private'],
            ['name' => 'api_order_list', 'hidden_default' => '', 'type' => 'public'],
            ['name' => 'api_order_detail', 'hidden_default' => '', 'type' => 'secret'],
        ]);
        DB::table('shop_api_process')->insert([
            ['api_id' => '1', 'secret_key' => '!CVCBsd$6j9ds3%flh[^d', 'hidden_fileds' => 'descriptions,cost', 'ip_allow' => '', 'ip_deny' => '127.0.0.11,1233.2.2.3', 'exp' => '2019-12-14 ', 'status' => '1'],
            ['api_id' => '1', 'secret_key' => '%GSFf13gkLtP@d', 'hidden_fileds' => '', 'ip_allow' => '', 'ip_deny' => '', 'exp' => null, 'status' => '1'],
        ]);
        DB::table('shop_attribute_detail')->insert([
            ['name' => 'Blue', 'attribute_id' => '1', 'product_id' => '16', 'sort' => '0'],
            ['name' => 'White', 'attribute_id' => '1', 'product_id' => '16', 'sort' => '0'],
            ['name' => 'S', 'attribute_id' => '2', 'product_id' => '16', 'sort' => '0'],
            ['name' => 'XL', 'attribute_id' => '2', 'product_id' => '16', 'sort' => '0'],
            ['name' => 'Blue', 'attribute_id' => '1', 'product_id' => '15', 'sort' => '0'],
            ['name' => 'Red', 'attribute_id' => '1', 'product_id' => '15', 'sort' => '0'],
            ['name' => 'S', 'attribute_id' => '2', 'product_id' => '15', 'sort' => '0'],
            ['name' => 'M', 'attribute_id' => '2', 'product_id' => '15', 'sort' => '0'],
        ]);
        DB::table('shop_attribute_group')->insert([
            ['name' => 'Color', 'status' => '1', 'sort' => '1', 'type' => 'radio'],
            ['name' => 'Size', 'status' => '1', 'sort' => '2', 'type' => 'select'],
        ]);
        DB::table('shop_brand')->insert([
            ['name' => 'Husq', 'image' => 'brand/1ca28f797c0f2edb635c4b51c2e7e952.png', 'url' => '', 'status' => '1', 'sort' => '0'],
            ['name' => 'Ideal', 'image' => 'brand/0a778de7e1e2f2a0635d6a1727e3de8d.png', 'url' => '', 'status' => '1', 'sort' => '0'],
            ['name' => 'Apex', 'image' => 'brand/d3abfcfc8c0fef7e1356fc637ab9d8d8.png', 'url' => '', 'status' => '1', 'sort' => '0'],
            ['name' => 'CST', 'image' => 'brand/185c50c85b83644e02e8b96639370341.png', 'url' => '', 'status' => '1', 'sort' => '0'],
            ['name' => 'Klein', 'image' => 'brand/3e11cc022e9f30774ab5f6a0c6c36451.png', 'url' => '', 'status' => '1', 'sort' => '0'],
            ['name' => 'Metabo', 'image' => 'brand/7868b0924b8f115aef70292aea1a67b8.png', 'url' => '', 'status' => '1', 'sort' => '0'],
        ]);
        DB::table('shop_category')->insert([
            ['id' => '1', 'image' => '', 'parent' => '0', 'top' => '1', 'sort' => '0', 'status' => '1'],
            ['id' => '2', 'image' => '', 'parent' => '0', 'top' => '1', 'sort' => '0', 'status' => '1'],
            ['id' => '3', 'image' => '', 'parent' => '0', 'top' => '1', 'sort' => '0', 'status' => '1'],
            ['id' => '4', 'image' => '', 'parent' => '0', 'top' => '1', 'sort' => '0', 'status' => '1'],
            ['id' => '5', 'image' => '', 'parent' => '0', 'top' => '1', 'sort' => '0', 'status' => '1'],
            ['id' => '6', 'image' => '', 'parent' => '9', 'top' => '0', 'sort' => '0', 'status' => '1'],
            ['id' => '7', 'image' => '', 'parent' => '4', 'top' => '0', 'sort' => '0', 'status' => '1'],
            ['id' => '8', 'image' => '', 'parent' => '4', 'top' => '0', 'sort' => '0', 'status' => '1'],
            ['id' => '9', 'image' => '', 'parent' => '0', 'top' => '1', 'sort' => '0', 'status' => '1'],
            ['id' => '10', 'image' => '', 'parent' => '2', 'top' => '0', 'sort' => '0', 'status' => '1'],
            ['id' => '11', 'image' => '', 'parent' => '1', 'top' => '0', 'sort' => '0', 'status' => '1'],
            ['id' => '12', 'image' => '', 'parent' => '1', 'top' => '0', 'sort' => '3', 'status' => '1'],
        ]);
        DB::table('shop_category_description')->insert([
            ['shop_category_id' => '1', 'lang_id' => '1', 'name' => 'SPORTSWEAR', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '2', 'lang_id' => '1', 'name' => 'MENS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '3', 'lang_id' => '1', 'name' => 'WOMENS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '4', 'lang_id' => '1', 'name' => 'KIDS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '5', 'lang_id' => '1', 'name' => 'FASHION', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '6', 'lang_id' => '1', 'name' => 'GUESS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '7', 'lang_id' => '1', 'name' => 'PUMA', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '8', 'lang_id' => '1', 'name' => 'ASICS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '9', 'lang_id' => '1', 'name' => 'HOUSEHOLDS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '10', 'lang_id' => '1', 'name' => 'VALENTINO', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '11', 'lang_id' => '1', 'name' => 'DIOR', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '12', 'lang_id' => '1', 'name' => 'FENDI', 'keyword' => '', 'description' => ''],

            ['shop_category_id' => '1', 'lang_id' => '2', 'name' => 'Mục SPORTSWEAR', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '2', 'lang_id' => '2', 'name' => 'Mục MENS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '3', 'lang_id' => '2', 'name' => 'Mục WOMENS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '4', 'lang_id' => '2', 'name' => 'Mục KIDS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '5', 'lang_id' => '2', 'name' => 'Mục FASHION', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '6', 'lang_id' => '2', 'name' => 'Mục GUESS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '7', 'lang_id' => '2', 'name' => 'Mục PUMA', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '8', 'lang_id' => '2', 'name' => 'Mục ASICS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '9', 'lang_id' => '2', 'name' => 'Mục HOUSEHOLDS', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '10', 'lang_id' => '2', 'name' => 'Mục VALENTINO', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '11', 'lang_id' => '2', 'name' => 'Mục DIOR', 'keyword' => '', 'description' => ''],
            ['shop_category_id' => '12', 'lang_id' => '2', 'name' => 'Mục FENDI', 'keyword' => '', 'description' => ''],
        ]);

        DB::table('shop_currency')->insert([
            ['id' => '1', 'name' => 'USD Dola', 'code' => 'USD', 'symbol' => '$', 'exchange_rate' => '1', 'precision' => '0', 'symbol_first' => '1', 'thousands' => ',', 'status' => '1', 'sort' => '0'],
            ['id' => '2', 'name' => 'VietNam Dong', 'code' => 'VND', 'symbol' => '₫', 'exchange_rate' => '20', 'precision' => '0', 'symbol_first' => '0', 'thousands' => ',', 'status' => '1', 'sort' => '1'],
        ]);

        DB::table('shop_order_status')->insert([
            ['id' => '1', 'name' => 'New'],
            ['id' => '2', 'name' => 'Processing'],
            ['id' => '3', 'name' => 'Hold'],
            ['id' => '4', 'name' => 'Canceled'],
            ['id' => '5', 'name' => 'Done'],
            ['id' => '6', 'name' => 'Failed'],
        ]);
        DB::table('shop_page')->insert([
            ['id' => '1', 'image' => '', 'uniquekey' => 'about', 'status' => '1'],
            ['id' => '2', 'image' => '', 'uniquekey' => 'contact', 'status' => '1'],
        ]);
        DB::table('shop_page_description')->insert([
            ['page_id' => '1', 'lang_id' => '1', 'title' => 'About', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
'],
            ['page_id' => '1', 'lang_id' => '2', 'title' => 'Giới thiệu', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
'],
            ['page_id' => '2', 'lang_id' => '1', 'title' => 'Contact', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
'],
            ['page_id' => '2', 'lang_id' => '2', 'title' => 'Liên hệ với chúng tôi', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
'],
        ]);

        DB::table('shop_payment_status')->insert([
            ['id' => '1', 'name' => 'Unpaid'],
            ['id' => '2', 'name' => 'Partial payment'],
            ['id' => '3', 'name' => 'Paid'],
            ['id' => '4', 'name' => 'Refurn'],
        ]);

        DB::table('shop_shipping_status')->insert([
            ['id' => '1', 'name' => 'Not sent'],
            ['id' => '2', 'name' => 'Sending'],
            ['id' => '3', 'name' => 'Shipping done'],
        ]);

        DB::table('shop_shipping')->insert([
            ['type' => '0', 'value' => '20000', 'free' => '10000000', 'status' => '1'],
        ]);

        DB::table('shop_vendor')->insert([
            ['id' => '1', 'name' => 'ABC distributor', 'email' => 'abc@abc.com', 'phone' => '012496657567', 'image' => '', 'address' => '', 'url' => '', 'sort' => '0'],
        ]);

        DB::table('shop_product')->insert([
            ['sku' => 'MEGA2560', 'image' => 'product/f2d9505d28f1b10f949cec466cada01e.jpeg', 'brand_id' => '1', 'vendor_id' => '1', 'category_id' => '7', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'LEDFAN1', 'image' => 'product/95349d3747fdaf79d391fdc98e083701.jpg', 'brand_id' => '1', 'vendor_id' => '1', 'category_id' => '6', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'CLOCKFAN1', 'image' => 'product/15aa6b1f31b53a0177d7653761a45274.jpeg', 'brand_id' => '2', 'vendor_id' => '1', 'category_id' => '12', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'CLOCKFAN2', 'image' => 'product/0e1416d509af3712bd801404ca928702.jpeg', 'brand_id' => '3', 'vendor_id' => '1', 'category_id' => '12', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'CLOCKFAN3', 'image' => 'product/95349d3747fdaf79d391fdc98e083701.jpg', 'brand_id' => '1', 'vendor_id' => '1', 'category_id' => '12', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'TMC2208', 'image' => 'product/95349d3747fdaf79d391fdc98e083701.jpg', 'brand_id' => '1', 'vendor_id' => '1', 'category_id' => '11', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'FILAMENT', 'image' => 'product/95349d3747fdaf79d391fdc98e083701.jpg', 'brand_id' => '2', 'vendor_id' => '1', 'category_id' => '12', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'A4988', 'image' => 'product/820283598735f98a9b23960821da438b.jpeg', 'brand_id' => '2', 'vendor_id' => '1', 'category_id' => '12', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'ANYCUBIC-P', 'image' => 'product/d63af407fa92299e163696a585566dc7.jpeg', 'brand_id' => '2', 'vendor_id' => '1', 'category_id' => '10', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => '3DHLFD-P', 'image' => 'product/95349d3747fdaf79d391fdc98e083701.jpg', 'brand_id' => '4', 'vendor_id' => '1', 'category_id' => '9', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'SS495A', 'image' => 'product/95349d3747fdaf79d391fdc98e083701.jpg', 'brand_id' => '2', 'vendor_id' => '1', 'category_id' => '6', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => '3D-CARBON1.75', 'image' => 'product/d05966a529efdd8d7b41ed9b687859b6.jpeg', 'brand_id' => '2', 'vendor_id' => '1', 'category_id' => '11', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => '3D-GOLD1.75', 'image' => 'product/eedfd153bf368919a134da17f22c8de7.jpeg', 'brand_id' => '3', 'vendor_id' => '1', 'category_id' => '10', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'LCD12864-3D', 'image' => 'product/a7a315526ecf7594731448d792714a11.jpeg', 'brand_id' => '3', 'vendor_id' => '1', 'category_id' => '11', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'LCD2004-3D', 'image' => 'product/9215506044b8a350fc082f5350b3653a.jpg', 'brand_id' => '3', 'vendor_id' => '1', 'category_id' => '9', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
            ['sku' => 'RAMPS1.5-3D', 'image' => 'product/cd7aa3394c35330ed7f9e4095c6adb65.jpeg', 'brand_id' => '2', 'vendor_id' => '1', 'category_id' => '11', 'price' => '15000', 'cost' => '10000', 'stock' => '100', 'type' => '0', 'status' => '1'],
        ]);

        DB::table('shop_product_description')->insert([
            ['product_id' => '1', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 1', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '2', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 2', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '3', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 3', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '4', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 4', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '5', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 5', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '6', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 6', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '7', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 7', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '8', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 8', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '9', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 9', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '10', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 10', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '11', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 11', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '12', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 12', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '13', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 13', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '14', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 14', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '15', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 15', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '16', 'lang_id' => '1', 'name' => 'Easy Polo Black Edition 16', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],

            ['product_id' => '1', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 1', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '2', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 2', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '3', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 3', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '4', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 4', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '5', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 5', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '6', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 6', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '7', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 7', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '8', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 8', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '9', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 9', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '10', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 10', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '11', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 11', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '12', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 12', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '13', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 13', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '14', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 14', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '15', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 15', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],
            ['product_id' => '16', 'lang_id' => '2', 'name' => 'Easy Polo Black Edition 16', 'keyword' => '', 'description' => '', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt="" src="/documents/photos/blogs/16d9_star_trek_tng_uniform_tee.jpeg" style="width: 262px; height: 262px; float: right; margin: 10px;" /></p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', ],

        ]);

        DB::table('shop_product_image')->insert([
            ['image' => 'product_slide/0642809276ecd6a28cb23d464cf41734.jpeg', 'product_id' => '1', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/f4786d81509a8d8ffa461535b07c77bc.png', 'product_id' => '1', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/e09af215f794f8225063c368f46a971d.jpeg', 'product_id' => '2', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/54fac65e58eb9abafe3ac1acbde5ee6d.jpeg', 'product_id' => '6', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/81f37c10d867710075e3ab6153a31d03.png', 'product_id' => '11', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/2fbba5ac3b9c0838e5ce2b536d0c5659.jpeg', 'product_id' => '10', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/8718dfdb75f951010cdce669768c3e3a.png', 'product_id' => '11', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/86282e4f808428108773596dea5ee29c.jpeg', 'product_id' => '14', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/b89873b9c888c0511e14c6e3abc798e8.jpeg', 'product_id' => '14', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/b0d9ffad7e40d07bae6d36665f765e0f.jpeg', 'product_id' => '14', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/70edffd9b5b4121fb8aee7e41c941f03.jpeg', 'product_id' => '10', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/e9d5898fc6daf50751ec0c4e91ed904d.jpeg', 'product_id' => '15', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/e91e85e37bb89ed854aa4123ce5eb14f.jpeg', 'product_id' => '15', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/bcf85f60d3fe35de2c1be6272f9605ef.png', 'product_id' => '15', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/40999526f41b1d4090e30c6b0ce21dca.jpg', 'product_id' => '16', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/7963a1dc4e1676c2b3bc97ade96de7b6.jpeg', 'product_id' => '16', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/101a109520cfbddde1be1791423010b6.jpeg', 'product_id' => '16', 'sort' => '1', 'status' => '1'],
            ['image' => 'product_slide/f02dbb115272eac46f46f015608ab93a.jpeg', 'product_id' => '16', 'sort' => '1', 'status' => '1'],

        ]);

    }

}
