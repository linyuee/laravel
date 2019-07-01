<?php

/*参数校验器
 * @throws Exception
 */
function validtor($rule, $method = 'GET')
{
    if ($method == 'GET') {
        $params = request()->query();
    } elseif ($method == 'POST') {
        $params = request()->post();
    } else {
        return [];
    }
    $result = [];
    foreach ($rule as $key => $item) {
        $requires = explode('||', $item);
        if (!array_key_exists($key, $params) && !in_array('*', $requires)) {
            throw new \App\Exceptions\ParamsException('缺少参数' . $key);
        }
        if (!array_key_exists($key, $params)) {
            continue;
        }
        foreach ($requires as $require) {
            //在这里扩展规则
            if (explode(':', $require)[0] == 'in') {
                if (!in_array($params[$key], explode(',', explode(':', $require)[1]))) {
                    throw new \App\Exceptions\ParamsException($key . '参数类型错误');
                }
            }
            //正则
            if (explode(':', $require)[0] == 'pattern') {
                if (!preg_match(explode(':', $require)[1], $params[$key])) {
                    throw new \App\Exceptions\ParamsException($key . '参数规则错误');
                }
            }
            //类型
            if (explode(':', $require)[0] == 'type') {
                $type = explode(':', $require)[1];
                if (($type == 'int' && !is_numeric($params[$key])) || ($type == 'array' && !is_array($params[$key]))) {
                    throw new \App\Exceptions\ParamsException($key . '参数类型错误');
                }
            }
            //长度
            if (explode(':', $require)[0] == 'length') {
                if (strlen($params[$key]) != explode(':', $require)[1]) {
                    throw new \App\Exceptions\ParamsException($key . '参数长度错误');
                }
            }

        }

        $result[$key] = $params[$key];
    }
    return $result;
}

function jsonResponse($data = null, $code = 0, $msg = 'ok', $headers = [])
{
    $factory = app(\Illuminate\Routing\ResponseFactory::class);
    $respone = array(
        'code' => $code,
        'data' => $data,
        'msg' => $msg,
    );
    return $factory->make($respone, 200, $headers);
}
