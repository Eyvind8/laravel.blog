<?php
    if (!function_exists('getUkrainianMonth')) {
        function getUkrainianMonth($dateString): string
        {
            $monthsUkrainian = [
                'січня', 'лютого', 'березня', 'квітня', 'травня', 'червня', 'липня',
                'серпня', 'вересня', 'жовтня', 'листопада', 'грудня'
            ];

            $carbonDate = \Carbon\Carbon::parse($dateString);
            $monthIndex = $carbonDate->month - 1;

            return $monthsUkrainian[$monthIndex];
        }
    }
