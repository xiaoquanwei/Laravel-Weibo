<?php
/**
 * User 数据模型文件
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;  // 模型工厂相关功能的引用
use Illuminate\Foundation\Auth\User as Authenticatable; // 授权相关功能的引用
use Illuminate\Notifications\Notifiable;  // 消息通知相关功能引用
use Laravel\Sanctum\HasApiTokens;  //  API 令牌修改功能

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * 字段白名单，只有在这个里面的字段才能被修改
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * 这里的字段，会在返回时隐藏
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 指定数据库字段使用的数据类型
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',  // email_verified_at 使用的是 datetime 时间类型
    ];

    // 生成头像
    public function gravatar($size = '100')
    {
        //$hash = md5(strtolower(trim($this->attributes['email'])));
        //return "https://cdn.v2ex.com/gravatar/$hash?s=$size";
        return "http://junwind.top/wp-content/uploads/2024/08/me.jpg";
    }


}
