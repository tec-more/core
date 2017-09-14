<?php

return [
    \Constants::METHOD_NOT_ALLOWED => [
        'title' => '方法不被允许',
        'message' => '很快返回',
    ],
    \Constants::UNAUTHORIZED_CODE => [
        'title' => '访问被阻止',
        'message' => '该请求尚未应用，因为它缺少目标资源的有效身份验证凭据'
    ],
    \Constants::FORBIDDEN_CODE => [
        'title' => '禁止',
        'message' => '您没有访问这些资源的权限'
    ],
    \Constants::NOT_FOUND_CODE => [
        'title' => '未发现',
        'message' => '我们找不到你要找的那页'
    ],
    \Constants::ERROR_CODE => [
        'title' => 'Internal 错误',
        'message' => '发生一些错误。查看错误日志以了解更多',
    ],
    \Constants::MAINTENANCE_MODE => [
        'title' => '维护模式',
        'message' => '本网站正在维护模式。我们很快就会回来',
    ],
];