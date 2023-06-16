<?php

function trierTableau($data, $sortColumn, $sortOrder)
{
    $sortedData = $data;

    usort($sortedData, function ($a, $b) use ($sortColumn, $sortOrder) {
        $valueA = $a[$sortColumn];
        $valueB = $b[$sortColumn];

        if ($sortOrder == 'asc') {
            return $valueA <=> $valueB;
        } else {
            return $valueB <=> $valueA;
        }
    });

    return $sortedData;
}

function rechercherTableau($data, $searchTerm)
{
    if (empty($searchTerm)) {
        return $data;
    }

    $filteredData = array();
    foreach ($data as $row) {
        foreach ($row as $cell) {
            if (stripos($cell, $searchTerm) !== false) {
                $filteredData[] = $row;
                break;
            }
        }
    }

    return $filteredData;
}

function paginerTableau($data, $itemsPerPage, $page)
{
    $startIndex = ($page - 1) * $itemsPerPage;
    $endIndex = $startIndex + $itemsPerPage - 1;
    $endIndex = min($endIndex, count($data) - 1);

    $pagedData = array_slice($data, $startIndex, $itemsPerPage);

    return array(
        'pagedData' => $pagedData,
        'totalPages' => ceil(count($data) / $itemsPerPage),
    );
}

?>
