<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MinprogramMemberTables extends Migration
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
        Schema::create(config('ptable.member'), function (Blueprint $table) {
            $table->id();
            $table->string('mobile', 11)->comment('全平台统一手机号');
            $table->tinyInteger('status')->comment('0：禁用；1：正常');
            $table->tinyInteger('level')->comment('1：普通会员；2：白银会员；3：黄金会员；4：白金会员；5：砖石会员；6：超级会员');
            $table->decimal('balance')->comment('余额');
            
            // 代替 $table->timestamps();自动维护的 created_at 和 updated_at 的字段类型
            $table->integer('created_at');
            $table->integer('updated_at');
        });
        
        Schema::create(config('ptable.member_info'), function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->comment('全平台统一用户ID，关联：'.config('ptable.member').' 表');
            $table->string('mobile', 11)->comment('全平台统一手机号');
            $table->tinyInteger('source_id')->comment('来源 1：微信；2：支付宝；3：prince商城');
            $table->tinyInteger('source_type')->comment('来源类型 1：小程序；2：公众号；3：APP');
            $table->string('openid', 32)->comment('第三方标识');
            $table->string('union_id', 32)->comment('第三方统一标识')->default('');
            $table->string('nick_name', 32)->comment('昵称');
            $table->string('avatar', 64)->comment('头像');
            // 代替 $table->timestamps();自动维护的 created_at 和 updated_at 的字段类型
            $table->integer('created_at');
            $table->integer('updated_at')->default(0);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('ptable.member'));
        Schema::dropIfExists(config('ptable.member_info'));
    }
}
