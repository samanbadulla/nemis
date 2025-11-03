<?php

namespace App\Livewire\Teacher;

use App\Imports\TeachersImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BulkTeachersImport extends Component
{
    use WithFileUploads;

    public $file;

    protected $rules = [
        'file' => 'required|file|mimes:xlsx,xls|max:5120', // 5MB limit
    ];

    public function import()
    {
        $this->validate();

        // Store uploaded file temporarily
        $storedPath = $this->file->store('imports', 'public');

        // Create import instance so we can access counters later
        $import = new TeachersImport(Auth::user()->people_id);

        try {
            Excel::import($import, storage_path('app/public/' . $storedPath));

            $successCount = $import->getSuccessCount();
            $failCount = $import->getFailCount();

            session()->flash('success', "Import completed: {$successCount} rows inserted, {$failCount} rows failed.");
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            // Log each validation failure
            foreach ($failures as $failure) {
                logger()->error('Excel validation failed', [
                    'row' => $failure->row(),
                    'attribute' => $failure->attribute(),
                    'errors' => $failure->errors(),
                    'values' => $failure->values(),
                ]);
            }

            $failedCount = count($failures);
            session()->flash('error', "Import validation failed for {$failedCount} rows. Check logs for details.". $e->getMessage());
        } catch (\Throwable $e) {
            logger()->error('Teacher import failed', ['error' => $e->getMessage()]);
            session()->flash('error', 'Import failed: ' . $e->getMessage());
        }

        return redirect()->route('teacher.list');
    }


    public function render()
    {
        return view('livewire.teacher.bulk-teachers-import');
    }
}
