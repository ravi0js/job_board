<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory;

    // Define available experience levels
    public static array $experience = ['entry', 'intermediate', 'senior'];

    // Define available job categories
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];


    public function employer():BelongsTo{
        return $this->belongsTo(Employer::class);
    }
    /**
     * Scope to filter jobs based on search criteria.
     * 
     * @param Builder|QueryBuilder $query   The job query builder
     * @param array $filters                The filter criteria from user input
     * @return Builder|QueryBuilder          The modified query
     */
    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    {
        return $query
            // Apply search filter (if provided)
            ->when($filters['search'] ?? null, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')  // Search job title
                        ->orWhere('description', 'like', '%' . $search . '%'); // Search job description
                });
            })
            
            // Apply minimum salary filter (if provided)
            ->when($filters['min_salary'] ?? null, function ($query, $minSalary) {
                $query->where('salary', '>=', $minSalary);
            })
            
            // Apply maximum salary filter (if provided)
            ->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {
                $query->where('salary', '<=', $maxSalary);
            })
            
            // Apply experience level filter (if provided)
            ->when($filters['experience'] ?? null, function ($query, $experience) {
                $query->where('experience', $experience);
            })
            
            // Apply job category filter (if provided)
            ->when($filters['category'] ?? null, function ($query, $category) {
                $query->where('category', $category);
            });
    }
}
