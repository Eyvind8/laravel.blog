<?php

/**
 * @param int $totalPages
 * @param int $currentPage
 * @return string
 */
function buildPagination(int $totalPages, int $currentPage)
{
    if ($totalPages < 2) {
        return '';
    }

    $pagination = '<ul class="pagination">';

    // Добавляем ссылку на предыдущую страницу
    if ($currentPage > 1) {
        $pagination .= '<li><a href="?page=' . ($currentPage - 1) . '">&laquo;</a></li>';
    } else {
        $pagination .= '<li><span class="disabled">&laquo;</span></li>';
    }

    // Добавляем ссылки на страницы
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            $pagination .= '<li class="active"><span>' . $i . '</span></li>';
        } else {
            $pagination .= '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
        }
    }

    // Добавляем ссылку на следующую страницу
    if ($currentPage < $totalPages) {
        $pagination .= '<li><a href="?page=' . ($currentPage + 1) . '">&raquo;</a></li>';
    } else {
        $pagination .= '<li><span class="disabled">&raquo;</span></li>';
    }

    $pagination .= '</ul>';

    return $pagination;
}
