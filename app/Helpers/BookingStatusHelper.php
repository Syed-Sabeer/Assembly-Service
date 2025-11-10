<?php

namespace App\Helpers;

/**
 * Booking Status Helper
 * Provides reusable functions for booking status management
 * 
 * Status codes:
 * 0 = pending
 * 1 = approved
 * 2 = rejected
 * 3 = on route
 * 4 = job completed
 */
class BookingStatusHelper
{
    /**
     * Status constants
     */
    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;
    const STATUS_REJECTED = 2;
    const STATUS_ON_ROUTE = 3;
    const STATUS_JOB_COMPLETED = 4;

    /**
     * Get status text by status code
     * 
     * @param int $status
     * @return string
     */
    public static function getStatusText($status)
    {
        return match((int)$status) {
            self::STATUS_PENDING => 'pending',
            self::STATUS_APPROVED => 'approved',
            self::STATUS_REJECTED => 'rejected',
            self::STATUS_ON_ROUTE => 'on_route',
            self::STATUS_JOB_COMPLETED => 'job_completed',
            default => 'unknown',
        };
    }

    /**
     * Get status label (formatted for display)
     * 
     * @param int $status
     * @return string
     */
    public static function getStatusLabel($status)
    {
        return match((int)$status) {
            self::STATUS_PENDING => 'Pending',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_REJECTED => 'Rejected',
            self::STATUS_ON_ROUTE => 'On Route',
            self::STATUS_JOB_COMPLETED => 'Job Completed',
            default => 'Unknown',
        };
    }

    /**
     * Get all status options
     * 
     * @return array
     */
    public static function getAllStatuses()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_REJECTED => 'Rejected',
            self::STATUS_ON_ROUTE => 'On Route',
            self::STATUS_JOB_COMPLETED => 'Job Completed',
        ];
    }

    /**
     * Check if status is valid
     * 
     * @param int $status
     * @return bool
     */
    public static function isValidStatus($status)
    {
        return in_array((int)$status, [
            self::STATUS_PENDING,
            self::STATUS_APPROVED,
            self::STATUS_REJECTED,
            self::STATUS_ON_ROUTE,
            self::STATUS_JOB_COMPLETED,
        ]);
    }
}

