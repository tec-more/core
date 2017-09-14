<?php

use Tuke\Base\CustomFields\Repositories\Contracts\CustomFieldRepositoryContract;

/**
 * @var \Tuke\Base\CustomFields\Repositories\CustomFieldRepository $customFieldRepo
 */
$customFieldRepo = app(CustomFieldRepositoryContract::class);

$pages = $customFieldRepo->getWhere([
    'use_for' => \Tuke\Base\Pages\Models\Page::class,
], ['id'])->pluck('id')->toArray();

$customFieldRepo->updateMultiple($pages, [
    'use_for' => TUKE_PAGES
]);