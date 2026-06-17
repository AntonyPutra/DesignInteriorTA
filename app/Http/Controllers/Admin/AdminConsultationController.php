<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class AdminConsultationController extends Controller
{
    public function index(Request $request)
    {
        $query = Consultation::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $consultations = $query->paginate(15)->withQueryString();
        $statuses      = ['pending', 'contacted', 'scheduled', 'finished', 'cancelled'];

        return view('admin.consultations.index', compact('consultations', 'statuses'));
    }

    public function show(Consultation $consultation)
    {
        return view('admin.consultations.show', compact('consultation'));
    }

    public function updateStatus(Request $request, Consultation $consultation)
    {
        $request->validate([
            'status' => 'required|in:pending,contacted,scheduled,finished,cancelled',
        ]);

        $consultation->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status konsultasi berhasil diperbarui.');
    }

    public function destroy(Consultation $consultation)
    {
        // Hapus file referensi jika ada
        if ($consultation->reference_file) {
            \Storage::disk('public')->delete($consultation->reference_file);
        }

        $consultation->delete();

        return redirect()->route('admin.consultations.index')->with('success', 'Data konsultasi berhasil dihapus.');
    }
}
