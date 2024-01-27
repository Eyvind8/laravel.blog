<?php

/**
 * Build pagination HTML for DataTables-style pagination.
 *
 * @param int $totalPages
 * @param int $currentPage
 * @return string
 */
function buildAdminPaginator(array $items)
{
    $totalPages = $items['total_pages'];
    $currentPage = $items['current_page'];

    if ($totalPages < 2) {
        return '';
    }

    $paginator = '<ul class="pagination">';

    // Previous page link
    if ($currentPage > 1) {
        $paginator .= '<li class="paginate_button page-item previous">'
            . '<a href="?page=' . ($currentPage - 1) . buildLinkQuery($items) . '" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
    }

    // Page links
    for ($i = 1; $i <= $totalPages; $i++) {
        $paginator .= '<li class="paginate_button page-item ' . ($i == $currentPage ? 'active' : '') . '">'
            . '<a href="?page=' . $i . buildLinkQuery($items) . '" aria-controls="example" data-dt-idx="' . $i . '" tabindex="0" class="page-link">' . $i . '</a></li>';
    }

    // Next page link
    if ($currentPage < $totalPages) {
        $paginator .= '<li class="paginate_button page-item next">'
            . '<a href="?page=' . ($currentPage + 1) . buildLinkQuery($items) . '" aria-controls="example" data-dt-idx="' . ($totalPages + 1) . '" tabindex="0" class="page-link">Next</a></li>';
    }

    $paginator .= '</ul>';

    return $paginator;
}
