<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workplaces extends Model
{
    use HasFactory;

    protected $table = 'workplaces';

    protected $fillable = ['workplace_id', 'office_level_id', 'parent_workplace_id'];

    // Relationships to each possible office table
    public function ministry()
    {
        return $this->hasOne(MinistryOfEducationOffice::class, 'workplace_id', 'workplace_id');
    }

    public function provincialMinistry()
    {
        return $this->hasOne(ProvincialMinistryOfEducationOffice::class, 'workplace_id', 'workplace_id');
    }

    public function provincial()
    {
        return $this->hasOne(ProvincialEducationOffice::class, 'workplace_id', 'workplace_id');
    }

    public function zonal()
    {
        return $this->hasOne(ZonalEducationOffice::class, 'workplace_id', 'workplace_id');
    }

    public function divisional()
    {
        return $this->hasOne(DivisionalEducationOffice::class, 'workplace_id', 'workplace_id');
    }

    public function institution()
    {
        return $this->hasOne(Institution::class, 'workplace_id', 'workplace_id');
    }

    /**
     * Dynamic accessor to return the actual office model
     */
    public function office()
    {
        return match ($this->office_level_id) {
            'OLID001' => $this->ministry,
            'OLID002' => $this->provincialMinistry,
            'OLID003' => $this->provincial,
            'OLID004' => $this->zonal,
            'OLID005' => $this->divisional,
            'OLID006' => $this->institution,
            default   => null,
        };
    }

    /**
     * Get the actual name of the workplace based on its office level.
     */
    public function getOfficeNameAttribute()
    {
        $office = $this->office();

        if (!$office) {
            return 'Unknown Office';
        }

        // Return the name field that exists in your related office models
        return $office->name
            ?? $office->short_name
            ?? 'Unnamed Office';
    }

    public function getAllChildWorkplaces()
    {
        $workplaceIds = [$this->workplace_id];
        
        // Get direct children
        $children = Workplaces::where('parent_workplace_id', $this->workplace_id)->get();
        
        foreach ($children as $child) {
            $workplaceIds = array_merge($workplaceIds, $child->getAllChildWorkplaces());
        }
        
        return $workplaceIds;
    }

    /**
     * Get all parent workplaces recursively
     */
    public function getAllParentWorkplaces()
    {
        $workplaceIds = [$this->workplace_id];
        
        if ($this->parent_workplace_id) {
            $parent = Workplaces::where('workplace_id', $this->parent_workplace_id)->first();
            if ($parent) {
                $workplaceIds = array_merge($workplaceIds, $parent->getAllParentWorkplaces());
            }
        }
        
        return $workplaceIds;
    }

    /**
     * Get workplace hierarchy (both parents and children)
     */
    public function getWorkplaceHierarchy()
    {
        $parents = $this->getAllParentWorkplaces();
        $children = $this->getAllChildWorkplaces();
        
        return array_unique(array_merge($parents, $children));
    }
}
