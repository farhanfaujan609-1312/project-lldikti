<?php

namespace App\Http\Controllers;

use App\Models\WasteRecord;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class WasteRecordController extends Controller
{
    /**
     * Display the dashboard and initial records.
     */
    public function index(Request $request): View|JsonResponse
    {
        $query = WasteRecord::query()->latest('weigh_date')->latest('id');

        if ($request->filled('rw')) {
            $query->where('rw', $request->string('rw'));
        }

        if ($request->filled('rt')) {
            $query->where('rt', $request->string('rt'));
        }

        if ($request->filled('search')) {
            $searchTerm = '%'.$request->string('search').'%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('owner_name', 'like', $searchTerm)
                    ->orWhere('address_kampung', 'like', $searchTerm)
                    ->orWhere('village', 'like', $searchTerm)
                    ->orWhere('district', 'like', $searchTerm)
                    ->orWhere('regency', 'like', $searchTerm)
                    ->orWhere('week_number', 'like', $searchTerm);
            });
        }

        $records = $query->get();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $records,
            ]);
        }

        // Preload all records for instantaneous client-side filtering matching the reference UI
        $allRecords = WasteRecord::latest('weigh_date')->latest('id')->get();

        return view('dashboard', [
            'initialRecords' => $allRecords,
        ]);
    }

    /**
     * Store a newly created waste record.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $this->validateRecord($request);
        $validated['user_id'] = Auth::id();

        $record = WasteRecord::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data penimbangan berhasil ditambahkan.',
            'data' => $record,
        ], 201);
    }

    /**
     * Update the specified waste record.
     */
    public function update(Request $request, WasteRecord $record): JsonResponse
    {
        $validated = $this->validateRecord($request);
        $record->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data penimbangan berhasil diperbarui.',
            'data' => $record->fresh(),
        ]);
    }

    /**
     * Remove the specified waste record.
     */
    public function destroy(WasteRecord $record): JsonResponse
    {
        $record->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data penimbangan berhasil dihapus.',
        ]);
    }

    /**
     * Export waste records for a given RT & RW to CSV.
     */
    public function exportCsv(Request $request): StreamedResponse
    {
        $rw = $request->string('rw', 'RW 16')->toString();
        $rt = $request->string('rt', 'RT 01')->toString();

        $records = WasteRecord::where('rw', $rw)
            ->where('rt', $rt)
            ->orderBy('weigh_date', 'desc')
            ->get();

        $safeRw = preg_replace('/[^A-Za-z0-9_-]/', '_', $rw);
        $safeRt = preg_replace('/[^A-Za-z0-9_-]/', '_', $rt);
        $fileName = "Penimbangan_Sampah_{$safeRw}_{$safeRt}.csv";

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () use ($records) {
            $handle = fopen('php://output', 'w');
            // Add UTF-8 BOM for Excel compatibility
            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'No',
                'Nama Pemilik',
                'Kampung',
                'RT',
                'RW',
                'Kelurahan/Desa',
                'Kecamatan',
                'Kabupaten',
                'Tanggal',
                'Minggu',
                'Organik (kg)',
                'Non-Organik (kg)',
                'Total (kg)',
            ]);

            foreach ($records as $index => $item) {
                fputcsv($handle, [
                    $index + 1,
                    $item->owner_name,
                    $item->address_kampung,
                    $item->rt,
                    $item->rw,
                    $item->village,
                    $item->district,
                    $item->regency,
                    $item->weigh_date ? $item->weigh_date->format('Y-m-d') : '',
                    $item->week_number,
                    number_format((float) $item->organic_weight, 1, '.', ''),
                    number_format((float) $item->non_organic_weight, 1, '.', ''),
                    number_format((float) $item->total_weight, 1, '.', ''),
                ]);
            }

            fclose($handle);
        }, 200, $headers);
    }

    /**
     * Validate the record request payload.
     *
     * @return array<string, mixed>
     */
    protected function validateRecord(Request $request): array
    {
        return $request->validate([
            'owner_name' => ['required', 'string', 'max:255'],
            'address_kampung' => ['required', 'string', 'max:255'],
            'rt' => ['required', 'string', 'max:50'],
            'rw' => ['required', 'string', 'max:50'],
            'village' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'regency' => ['required', 'string', 'max:255'],
            'weigh_date' => ['required', 'date'],
            'week_number' => ['required', 'string', 'max:50'],
            'organic_weight' => ['required', 'numeric', 'min:0'],
            'non_organic_weight' => ['required', 'numeric', 'min:0'],
        ], [
            'owner_name.required' => 'Nama pemilik rumah wajib diisi.',
            'address_kampung.required' => 'Alamat atau nama kampung wajib diisi.',
            'rt.required' => 'RT wajib diisi.',
            'rw.required' => 'RW wajib diisi.',
            'village.required' => 'Desa / Kelurahan wajib diisi.',
            'district.required' => 'Kecamatan wajib diisi.',
            'regency.required' => 'Kabupaten wajib diisi.',
            'weigh_date.required' => 'Tanggal penimbangan wajib diisi.',
            'weigh_date.date' => 'Format tanggal tidak valid.',
            'week_number.required' => 'Minggu ke- wajib dipilih.',
            'organic_weight.required' => 'Berat sampah organik wajib diisi.',
            'organic_weight.numeric' => 'Berat sampah organik harus berupa angka.',
            'non_organic_weight.required' => 'Berat sampah non-organik wajib diisi.',
            'non_organic_weight.numeric' => 'Berat sampah non-organik harus berupa angka.',
        ]);
    }
}
