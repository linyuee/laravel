<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;


/**
 * Model UserModel
 *
 * @property int $id
 * @property string $username
 * @property string $phone
 * @property int $created_at
 * @property int $updated_at
 * @property int $is_delete
 *
 * @method static \Illuminate\Database\Query\Builder | \App\Models\UserModel where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static \Illuminate\Database\Query\Builder | \App\Models\UserModel whereIn($column, $values, $boolean = 'and', $not = false)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\UserModel leftJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\UserModel rightJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\UserModel get($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\UserModel paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Query\Builder | \App\Models\UserModel find($id, $columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\UserModel first($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\UserModel select($columns = ['*'])
 * @method static \Illuminate\Database\Query\Builder | \App\Models\UserModel orderBy($column, $direction = 'asc')
 * @package App\Model
 */
class UserModel extends Model
{
    protected $table = 'user';
    protected $dateFormat = 'U';



}