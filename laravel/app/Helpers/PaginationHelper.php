<?php

/**
 * @param int $totalPages
 * @param int $currentPage
 * @return string
 */
function buildPagination(array $items)
{
    $totalPages = $items['total_pages'];
    $currentPage = $items['current_page'];

    if ($totalPages < 2) {
        return '';
    }

    $pagination = '<ul class="pagination">';

    // Добавляем ссылку на предыдущую страницу
    if ($currentPage > 1) {
        $pagination .= '<li><a href="?page=' . ($currentPage - 1) . buildLinkQuery($items) . '">&laquo;</a></li>';
    } else {
        $pagination .= '<li><span class="disabled">&laquo;</span></li>';
    }

    // Добавляем ссылки на страницы
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            $pagination .= '<li class="active"><span>' . $i . '</span></li>';
        } else {
            $pagination .= '<li><a href="?page=' . $i . buildLinkQuery($items) . '">' . $i . '</a></li>';
        }
    }

    // Добавляем ссылку на следующую страницу
    if ($currentPage < $totalPages) {
        $pagination .= '<li><a href="?page=' . ($currentPage + 1) . buildLinkQuery($items) . '">&raquo;</a></li>';
    } else {
        $pagination .= '<li><span class="disabled">&raquo;</span></li>';
    }

    $pagination .= '</ul>';

    return $pagination;
}

/**
 * @param array $items
 * @return string
 */
function buildLinkQuery(array $items): string
{
    $allowedKeys = ['limit', 'sort', 'sort_dir', 'search', 'tag_id'];

    $data = array_filter($items, function ($value, $key) use ($allowedKeys) {
        return in_array($key, $allowedKeys) && $value !== null && $value !== '';
    }, ARRAY_FILTER_USE_BOTH);

    return http_build_query($data);
}
